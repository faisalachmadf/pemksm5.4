<?php

use Illuminate\Database\Seeder;

class KatdnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katdns')->insert([
        [
		'name'=>'Kerjasama Antar Daerah',
		'slug'=>'Kerjasama-Antar-Daerah', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Kerjasama dengan Pihak Ketiga',
		'slug'=>'Kerjasama-dengan-Pihak-Ketiga', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

	]);
    }
}
