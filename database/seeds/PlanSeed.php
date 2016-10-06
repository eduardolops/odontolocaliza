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
                "name"       => "Plano Start",
                "price"      => 29.99,
                "time_plan"  => '1',
                "discount"   => 0,
                "created_at" => $now,
                "updated_at" => $now,
            ]
        ]);
    }
}
