<?php

use Illuminate\Database\Seeder;

class KatbagiansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katbagians')->insert([
        [
		'name'=>'Urusan Pemerintahan Daerah',
		'slug'=>'Urusan-Pemerintahan-Daerah', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Tata Pemerintahan',
		'slug'=>'Tata-Pemerintahan', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Kerja Sama',
		'slug'=>'Kerja-Sama', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
	]);
    }
}
