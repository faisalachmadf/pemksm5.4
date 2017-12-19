<?php

use Illuminate\Database\Seeder;

class KatjenislnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katjenislns')->insert([
        [
		'name'=>'Letter Of Intens',
		'slug'=>'Letter-Of-Intens', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'MoU',
		'slug'=>'MoU', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
	]);
    }
}
