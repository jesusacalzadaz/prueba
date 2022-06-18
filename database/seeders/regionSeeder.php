<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class regionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('regions')->insert(['id_reg'=>1,'description' => "Region 1", "status"=>"A"]);
        DB::table('regions')->insert(['id_reg'=>2,'description' => "Region 2", "status"=>"A"]);
        DB::table('regions')->insert(['id_reg'=>3,'description' => "Region 3", "status"=>"A"]);
        DB::table('regions')->insert(['id_reg'=>4,'description' => "Region 4", "status"=>"I"]);
        DB::table('regions')->insert(['id_reg'=>5,'description' => "Region 5", "status"=>"trash"]);
    }
}
