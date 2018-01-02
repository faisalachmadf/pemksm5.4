<?php

use Illuminate\Database\Seeder;

class KathukumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kathukums')->insert([
        [
		'name'=>'Undang-Undang',
		'slug'=>'Undang-Undang', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Peraturan Pemerintah',
		'slug'=>'Peraturan-Pemerintah', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Peraturan Presiden',
		'slug'=>'Peraturan-Presiden', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Keputusan Presiden',
		'slug'=>'Keputusan-Presiden', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Peraturan Menteri Dalam Negeri',
		'slug'=>'Peraturan-Menteri-Dalam-Negeri', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Keputusan Menteri Dalam Negeri',
		'slug'=>'Keputusan-Menteri-Dalam-Negeri', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Peraturan Menteri Luar Negeri',
		'slug'=>'Peraturan-Menteri-Luar-Negeri', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Peraturan Menteri Ketenagakerjaan',
		'slug'=>'Peraturan-Menteri-Ketenagakerjaan', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Peraturan Daerah Provinsi Jawa Barat',
		'slug'=>'Peraturan-Daerah-Provinsi-Jawa-Barat', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Peraturan Gubernur Provinsi Jawa Barat',
		'slug'=>'Peraturan-Gubernur-Provinsi-Jawa-Barat', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Keputusan Gubernur Provinsi Jawa Barat',
		'slug'=>'Keputusan-Gubernur-Provinsi-Jawa-Barat', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Surat Edaran',
		'slug'=>'Surat-Edaran', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
	]);
    }
}
