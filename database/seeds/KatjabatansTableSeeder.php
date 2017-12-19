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
		'name'=>'Kepala Bagian Tata Pemerintahan',
		'slug'=>'Kepala-Bagian-Tata-Pemerintahan', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Kepala Bagian Kerja Sama',
		'slug'=>'Kepala-Bagian-Kerja-Sama', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
	]);
    }
}
