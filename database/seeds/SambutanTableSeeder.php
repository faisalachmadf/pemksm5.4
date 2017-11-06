<?php

use Illuminate\Database\Seeder;

class SambutanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sambutans')->insert([
		'nama'=>'Dr. Ir. M taufiq BS',
		'jabatan'=>'Kepala Biro Pemerintahan dan Kerjasama',
		'isi'=>'Assalamualaikum Wr. Wb', 
		'gambar'=>'img', 
		'created_at'=>'2017-08-17 10:00:00',
		'updated_at'=>'2017-08-17 10:00:00'
]);
    }
}
