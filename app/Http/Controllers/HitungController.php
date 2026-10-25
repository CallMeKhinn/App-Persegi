<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function LuasPersegi(Request $data)
    {
        $sisi = $data->sisi;
        $luas = $sisi * $sisi;
        $keliling = 4 * $sisi;

        return view('Persegi')->with([
            'luas' => $luas,
            'sisi' => $sisi,
            'keliling' => $keliling,
        ]);
    }
    public function Persegipanjang(Request $data)
    {
        $panjang = $data->panjang;
        $lebar = $data->lebar;
        $luas = $panjang * $lebar;
        $keliling = 2 * ($panjang + $lebar);

        return view('Pers_panjang')->with([
            'luas' => $luas,
            'panjang' => $panjang,
            'lebar' => $lebar,
            'keliling' => $keliling,
        ]);
    }

    public function Lingkaran(Request $data)
    {
        $jari_jari = $data->jari_jari;
        $luas = pi() * $jari_jari * $jari_jari;
        $keliling = 2 * pi() * $jari_jari;

        return view('Lingkaran')->with([
            'luas' => $luas,
            'jari_jari' => $jari_jari,
            'keliling' => $keliling,
        ]);
    }

    public function Segitiga(Request $data)
    {
        $alas = $data->alas;
        $tinggi = $data->tinggi;
        $luas = 0.5 * $alas * $tinggi;

        return view('Segitiga')->with([
            'luas' => $luas,
            'alas' => $alas,
            'tinggi' => $tinggi,
        ]);
    }
}