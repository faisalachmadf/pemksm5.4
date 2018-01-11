<?php

use Illuminate\Database\Seeder;

class KatjabatansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katjabatans')->insert([
        [
		'name'=>'Kepala Biro Pemerintahan dan Kerja Sama',
		'slug'=>'Kepala-Biro-Pemerintahan-dan-Kerja-Sama', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Kepala Bagian Urusan Pemerintahan Daerah',
		'slug'=>'Kepala-Bagian-Urusan-Pemerintahan-Daerah', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Kepala Subbagian Urusan Pemerintahan Daerah',
		'slug'=>'Kepala-Subbagian-Urusan-Pemerintahan-Daerah', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Kepala Bagian Tata Pemerintahan',
		'slug'=>'Kepala-Bagian-Tata-Pemerintahan', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Kepala Subbagian Tata Pemerintahan',
		'slug'=>'Kepala-Subbagian-Tata-Pemerintahan', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Kepala Bagian Kerja Sama',
		'slug'=>'Kepala-Bagian-Kerja-Sama', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Kepala Subbagian Kerja Sama',
		'slug'=>'Kepala-Subbagian-Kerja-Sama', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Jabatan Fungsional',
		'slug'=>'Jabatan Fungsional', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Analis Urusan Pemerintahan Daerah',
		'slug'=>'Analis-Urusan-Pemerintahan-Daerah', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Analis Tata Pemerintahan',
		'slug'=>'Analis-Tata-Pemerintahan', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Analis Kerja Sama',
		'slug'=>'Analis-Kerja-Sama', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Pengadministrasi Umum Urusan Pemerintahan Daerah',
		'slug'=>'Pengadministrasi-Umum-Urusan-Pemerintahan-Daerah', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Pengadministrasi Umum Tata Pemerintahan',
		'slug'=>'Pengadministrasi-Umum-Tata-Pemerintahan', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Pengadministrasi Umum Kerja Sama',
		'slug'=>'Pengadministrasi-Umum-Kerja-Sama', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Tenaga Non PNS',
		'slug'=>'Tenaga-Non-PNS', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
	]);
    }
}
