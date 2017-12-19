<?php

use Illuminate\Database\Seeder;

class KatjenisdnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katjenisdns')->insert([
		[
		'name'=>'Kesepakatan Bersama',
		'slug'=>'Kesepakatan-Bersama', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
        [
		'name'=>'Perjanjian Kerjasama',
		'slug'=>'Perjanjian-Kerjasama', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],


	]);
    }
}
