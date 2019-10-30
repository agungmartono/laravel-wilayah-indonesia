<?php

use Illuminate\Database\Seeder;

class KabupatenTableSeeder extends Seeder
{
    protected $table;
 
    protected $filename;

    public function __construct()
    {
 
        $this->table = 'kabupaten';
        $this->filename = base_path('database/csv/kabupaten.csv');
     
    }

    public function run()
    {
        DB::table($this->table)->delete();
        $header = null;
        $seedData = $this->seedFromCSV($this->filename, $header);
        foreach ($seedData as $key => $kabupaten) {
            $seedData[$key] = $kabupaten;
            $seedData[$key]['created_at'] = \Carbon\Carbon::now();
            $seedData[$key]['updated_at'] = \Carbon\Carbon::now();
        }
    
        DB::table($this->table)->insert($seedData);
    }

    private function seedFromCSV($filename, $header)
    {
        $delimiter = ",";
        if(!file_exists($filename) || !is_readable($filename))
        {
            return FALSE;
        }
 
        $data = array();
 
        if(($handle = fopen($filename, 'r')) !== FALSE)
        {
            while(($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(!$header) {
                    $header = $row;
                } else {
                    $data[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
 
        return $data;
    }
}
