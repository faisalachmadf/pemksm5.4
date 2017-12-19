<?php

use Illuminate\Database\Seeder;

class KatmitralnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katmitralns')->insert([
        [
		'name'=>'Pemerintahan di Luar Negeri',
		'slug'=>'Pemerintahan-di-Luar-Negeri', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
		[
		'name'=>'Lembaga',
		'slug'=>'Lembaga', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],
		[
		'name'=>'Swasta',
		'slug'=>'Swasta', 
		'created_at'=>'2017-12-19 10:00:00',
		'updated_at'=>'2017-12-19 10:00:00'
		],	]);
    }
}
