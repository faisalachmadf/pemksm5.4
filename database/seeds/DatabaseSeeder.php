<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SambutanTableSeeder::class);
        $this->call(KatbagiansTableSeeder::class);
        $this->call(KatberitasTableSeeder::class);
        $this->call(KatdnsTableSeeder::class);
        $this->call(KatfilesTableSeeder::class);
        $this->call(KatgolongansTableSeeder::class);
        $this->call(KathukumsTableSeeder::class);
        $this->call(KatjabatansTableSeeder::class);
        $this->call(KatjenisdnsTableSeeder::class);
        $this->call(KatjenislnsTableSeeder::class);
        $this->call(KatlaporansTableSeeder::class);
        $this->call(KatlnsTableSeeder::class);
        $this->call(KatmitralnsTableSeeder::class);
        $this->call(KatmitrasTableSeeder::class);
        $this->call(KatopdsTableSeeder::class);
    }
}
