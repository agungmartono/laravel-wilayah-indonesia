<?php

use Illuminate\Database\Seeder;

class KecamatanTableSeeder extends Seeder
{
    protected $table;
 
    protected $filename;

    public function __construct()
    {
 
        $this->table = 'kecamatan';
        $this->filename = base_path('database/csv/kecamatan.csv');
     
    }

    public function run()
    {
        DB::table($this->table)->delete();
        $header = null;
        $seedData = $this->seedFromCSV($this->filename, $header);
        foreach ($seedData as $key => $kecamatan) {
            $seedData[$key] = $kecamatan;
            $seedData[$key]['created_at'] = \Carbon\Carbon::now();
            $seedData[$key]['updated_at'] = \Carbon\Carbon::now();
        }
    
        $collection = collect($seedData);
            foreach ($collection->chunk(50) as $chunk) {
                DB::table('kecamatan')->insert($chunk->toArray());
            }
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
            while(($row = fgetcsv($handle,2000, $delimiter)) !== FALSE)
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
