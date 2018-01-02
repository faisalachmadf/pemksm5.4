<?php

use Illuminate\Database\Seeder;

class KatmitrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katmitras')->insert([
        [
		'name'=>'Antar Provinsi',
		'slug'=>'Antar-Provinsi', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Kab-Kota',
		'slug'=>'Kab-Kota', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],


		[
		'name'=>'Pihak Ketiga',
		'slug'=>'Pihak-Ketiga', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],




	]);
    }
}
