<?php

use Illuminate\Database\Seeder;

class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [
                'name' => 'eduardo lopes',
	            'email' => 'eduardolopes@hotmail.com',
	            'password' => Hash::make('123'),
            ], [
                'name' => 'rafael araujo',
	            'email' => 'rafaelaraujo@hotmail.com',
	            'password' => Hash::make('123'),
            ],
        ]);
    }
}
