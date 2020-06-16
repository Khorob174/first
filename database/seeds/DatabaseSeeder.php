<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
          DB::table('reservations')->insert([
          'arrival'=> rand(0,30).'/'.rand(0,12).'/2020',
          'booking_number'=> rand(0,30),
          'stat'=>'0',
          'slug'=>  rand(0,30) . "-" . date("Y-m-d-H-i-s"),
          'created_at'=>date("Y-m-d H:i:s"),
          'updated_at'=>date("Y-m-d H:i:s")
      ]);
    }
}
