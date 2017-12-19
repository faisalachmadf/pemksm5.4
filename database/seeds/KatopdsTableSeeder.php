<?php

use Illuminate\Database\Seeder;

class KatopdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katopds')->insert([
		'name'=>'Biro Pemerintahan dan Kerjasama',
		'slug'=>'Biro Pemerintahan dan Kerjasama',
		'gambar'=>'img', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
	]);
    }
}
