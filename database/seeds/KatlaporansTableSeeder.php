<?php

use Illuminate\Database\Seeder;

class KatlaporansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katlaporans')->insert([
        [
		'name'=>'LKIP',
		'slug'=>'LKIP', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

        [
		'name'=>'Transparansi Anggaran',
		'slug'=>'Transparansi-Anggaran', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Transparansi Kinerja',
		'slug'=>'Transparansi-Kinerja', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],

		[
		'name'=>'Laporan Lainnya',
		'slug'=>'Laporan-Lainnya', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
	]);
    }
}
