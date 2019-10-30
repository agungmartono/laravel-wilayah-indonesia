<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $provinsi = DB::table('provinsi')->count();
        $kabupaten = DB::table('kabupaten')->count();
        $kecamatan = DB::table('kecamatan')->count();
        $desa = DB::table('desa')->count();

        $allProvinsi = DB::table('provinsi')->pluck("nama","id");

        return view('welcome', ['provinsi'=>$provinsi, 'kabupaten'=>$kabupaten, 'kecamatan'=>$kecamatan, 'desa'=>$desa, 'allProvinsi'=>$allProvinsi]);
    }


    public function getKabupaten(Request $request)
    {

        if (!$request->provinsi_id) {
            $html = '<option value="">'.Tes.'</option>';
        } else {
            $html = '';
            $kabupaten = DB::table("kabupaten")->where("provinsi_id", $request->provinsi_id)->get();
            foreach ($kabupaten as $kab) {
                $html .= '<option value="'.$kab->id.'">'.$kab->nama.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

    public function getKecamatan(Request $request)
    {

        if (!$request->kabupaten_id) {
            $html = '<option value="">'.Tes.'</option>';
        } else {
            $html = '';
            $kecamatan = DB::table("kecamatan")->where("kabupaten_id", $request->kabupaten_id)->get();
            foreach ($kecamatan as $kec) {
                $html .= '<option value="'.$kec->id.'">'.$kec->nama.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }

    public function getDesa(Request $request)
    {

        if (!$request->kecamatan_id) {
            $html = '<option value="">'.Tes.'</option>';
        } else {
            $html = '';
            $desa = DB::table("desa")->where("kecamatan_id", $request->kecamatan_id)->get();
            foreach ($desa as $desa) {
                $html .= '<option value="'.$desa->id.'">'.$desa->nama.'</option>';
            }
        }

        return response()->json(['html' => $html]);
    }
}
