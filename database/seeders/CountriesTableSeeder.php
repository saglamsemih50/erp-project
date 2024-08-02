<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      DB::table('countries')->delete();
      $countries = array(
        array('id' => '1', 'iso' => 'TR', 'name' => 'TURKEY', 'nicename' => 'Turkey', 'iso3' => 'TUR', 'numcode' => '792', 'phonecode' => '90'),
        array('id' => '2', 'iso' => 'AZ', 'name' => 'AZERBAIJAN', 'nicename' => 'Azerbaijan', 'iso3' => 'AZE', 'numcode' => '31', 'phonecode' => '994'),
    );
    DB::table('countries')->insert($countries);
    }
}
