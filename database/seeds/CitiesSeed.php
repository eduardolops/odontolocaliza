<?php

use Illuminate\Database\Seeder;

class CitiesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $now = date("Y-m-d H:i:s");
       DB::table("cities")->insert([
            [
                "id_state"   => 20,
                "name"       => "Presidente Prudente",
                "created_at" => $now,
                "updated_at" => $now,
            ]
        ]);
    }
}
