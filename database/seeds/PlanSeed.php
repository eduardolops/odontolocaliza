<?php

use Illuminate\Database\Seeder;

class PlanSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("plans")->insert([
            [
                "name"       => "Plano Basico",
                "identifier" => "plano_basico",
                "price"      => 29.90,
                "status"     => 'inactive',
                "created_at" => $now,
                "updated_at" => $now,
            ],
            [
                "name"       => "Plano Premium",
                "identifier" => "plano_premium",
                "price"      => 34.90,
                "status"     => 'inactive',
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);
    }
}
