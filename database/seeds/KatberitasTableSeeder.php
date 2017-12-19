<?php

use Illuminate\Database\Seeder;

class KatberitasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katberitas')->insert([
        [
		'name'=>'Berita Umum',
		'slug'=>'Berita-Umum', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Berita Urusan Pemerintahan Daerah',
		'slug'=>'Berita-Urusan-Pemerintahan-Daerah', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Berita Tata Pemerintahan',
		'slug'=>'Berita-Tata-Pemerintahan', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Berita Kerja Sama',
		'slug'=>'Berita-Kerja-Sama', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Artikel',
		'slug'=>'Artikel', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Faq',
		'slug'=>'Faq', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
	]);
    }
}
