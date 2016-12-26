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
        // $this->call(SpecializationSeed::class);
        // $this->call(StatesSeed::class);
        // $this->call(CitiesSeed::class);
        // $this->call(PlanSeed::class);

        DB::table('admins')->insert([
            'name' => 'eduardo lopes',
            'email' => 'eduardolopes@hotmail.com',
            'password' => Hash::make('123'),
        ]);
    }
}
