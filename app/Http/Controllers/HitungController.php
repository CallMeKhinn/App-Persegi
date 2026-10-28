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

        if ($jari_jari % 7 == 0) {
            $pi = 22 / 7;
        } else {
            $pi = 3.14;
        }

        $luas = $pi * $jari_jari * $jari_jari;
        $keliling = 2 * $pi * $jari_jari;

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
    public function Kerucut(Request $data)
    {
        $jari_jari = $data->jari_jari;
        $tinggi = $data->tinggi;

        if ($jari_jari % 7 == 0) {
            $pi = 22 / 7;
        } else {
            $pi = 3.14;
        }

        $s = sqrt(($tinggi * $tinggi) + ($jari_jari * $jari_jari));
        $luas = $pi * $jari_jari * ($jari_jari + $s);
        $volume = (1 / 3) * $pi * ($jari_jari * $jari_jari) * $tinggi;

        return view('Kerucut')->with([
            'luas' => $luas,
            'volume' => $volume,
            'jari_jari' => $jari_jari,
            'tinggi' => $tinggi,
        ]);
    }
    public function Tabung(Request $data)
    {
        $jari_jari = $data->jari_jari;
        $tinggi = $data->tinggi;

        if ($jari_jari % 7 == 0) {
            $pi = 22 / 7;
        } else {
            $pi = 3.14;
        }

        $luas = 2 * $pi * $jari_jari * ($jari_jari + $tinggi);
        $volume = $pi * ($jari_jari * $jari_jari) * $tinggi;

        return view('Tabung')->with([
            'luas' => $luas,
            'volume' => $volume,
            'jari_jari' => $jari_jari,
            'tinggi' => $tinggi,
        ]);
    }
    public function Prisma(Request $data)
    {
        $luas_alas = $data->luas_alas;
        $tinggi = $data->tinggi;
        $keliling_alas = $data->keliling_alas ?? 0;

        $luas = (2 * $luas_alas) + ($keliling_alas * $tinggi);
        $volume = $luas_alas * $tinggi;

        return view('Prisma')->with([
            'luas' => $luas,
            'volume' => $volume,
            'luas_alas' => $luas_alas,
            'tinggi' => $tinggi,
        ]);
    }
}