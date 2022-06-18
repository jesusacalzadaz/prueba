<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class communeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('communes')->insert(['id_com'=>1, 'id_reg'=>1, 'description' => "Commune 1", "status"=>"A"]);
        DB::table('communes')->insert(['id_com'=>2, 'id_reg'=>1, 'description' => "Commune 2", "status"=>"A"]);
        DB::table('communes')->insert(['id_com'=>3, 'id_reg'=>1, 'description' => "Commune 3", "status"=>"A"]);
        DB::table('communes')->insert(['id_com'=>4, 'id_reg'=>1, 'description' => "Commune 4", "status"=>"A"]);
        DB::table('communes')->insert(['id_com'=>5, 'id_reg'=>2, 'description' => "Commune 5", "status"=>"A"]);
        DB::table('communes')->insert(['id_com'=>6, 'id_reg'=>2, 'description' => "Commune 6", "status"=>"A"]);
        DB::table('communes')->insert(['id_com'=>7, 'id_reg'=>2, 'description' => "Commune 7", "status"=>"A"]);
        DB::table('communes')->insert(['id_com'=>8, 'id_reg'=>3, 'description' => "Commune 8", "status"=>"A"]);
        DB::table('communes')->insert(['id_com'=>9, 'id_reg'=>3, 'description' => "Commune 9", "status"=>"A"]);
        DB::table('communes')->insert(['id_com'=>10,'id_reg'=>3, 'description' => "Commune 10", "status"=>"A"]);
    }
}
