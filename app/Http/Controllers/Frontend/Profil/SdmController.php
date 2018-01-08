<?php

namespace App\Http\Controllers\Frontend\Profil;

use App\Http\Controllers\Controller;
use App\Models\Profil\Pegawai;
use App\Models\Kategori\Katbagian;
use App\Models\Kategori\Katjabatan;
use App\Models\Kategori\Katgolongan;

class SdmController extends Controller
{
     public function index()
    {
    	$data = [
            'karos' => Pegawai::getDataByKat('Kepala-Biro-Pemerintahan-Dan-Kerja-Sama')->get(),
            'kabagurpemdas' => Pegawai::getDataByKat('Kepala-Bagian-Urusan-Pemerintahan-Daerah')->get(),
            'kabagtapems' => Pegawai::getDataByKat('Kepala-Bagian-Tata-Pemerintahan')->get(),
            'kabagkerjasamas' => Pegawai::getDataByKat('Kepala-Bagian-Kerja-Sama')->get(),
            'kasubagurpemdas' => Pegawai::getDataByKat('Kepala-Subbagian-Urusan-Pemerintahan-Daerah')->get(),
            'kasubagtapems' => Pegawai::getDataByKat('Kepala-Subbagian-Tata-Pemerintahan')->get(),
            'kasubagkerjasamas' => Pegawai::getDataByKat('Kepala-Subbagian-Kerja-Sama')->get(),
            'analisisurpemdas' => Pegawai::getDataByKat('Analis-Urusan-Pemerintahan-Daerah')->get(),
            'analisistapems' => Pegawai::getDataByKat('Analis-Tata-Pemerintahan')->get(),
            'analisiskerjasamas' => Pegawai::getDataByKat('Analis-Kerja-Sama')->get(),
            'administrasiurpemdas' => Pegawai::getDataByKat('Pengadministrasi-Umum-Urusan-Pemerintahan-Daerah')->get(),
            'administrasitapems' => Pegawai::getDataByKat('Pengadministrasi-Umum-Pemerintahan')->get(),
            'administrasikerjasamas' => Pegawai::getDataByKat('Pengadministrasi-Umum-Kerja-Sama')->get(),
            'ahlis' => Pegawai::getDataByKat('Tenaga-Non-PNS')->get(),
            
        ];

         return view('page.profile.struktur', $data);
    }

}
