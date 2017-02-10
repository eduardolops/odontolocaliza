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
        $this->call(SpecializationSeed::class);
        $this->call(InfoComplementarySeed::class);
        $this->call(PlanSeed::class);
        $this->call(AdminSeed::class);
        $this->call(StatesSeed::class);
        $this->call(CitiesSeed::class);
        $this->call(HealthInsurancesSeeder::class);
    }
}
