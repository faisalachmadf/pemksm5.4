<?php

use Illuminate\Database\Seeder;

class KatlnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katlns')->insert([
        [
		'name'=>'Antar Pemerintahan di Luar Negeri',
		'slug'=>'Antar-Pemerintahan-di-Luar-Negeri', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
		[
		'name'=>'Lembaga di Luar Negeri',
		'slug'=>'Lembaga-di-Luar-Negeri', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
		[
		'name'=>'Swasta di Luar Negeri',
		'slug'=>'Swasta-di-Luar-Negeri', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],	]);
    }
}
