<?php

use Illuminate\Database\Seeder;
use Doctor\Models\Specialization;

class SpecializationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = [
            'CD'  => 'Cirurgião Dentista',
            'TPD' => 'Técnico em Prótese Dentaria',
            'TSB' => 'Técnico em Saúde Bucal',
            'ABS' => 'Auxiliar em Saúde Bucal',
            'APD' => 'Auxiliar de Prótese Dentaria',
            'CL'  => 'Clinica Odontológica',
            'LB'  => 'Laboratório'
        ];

        foreach($contents as $k => $content){
            $fields = [ 'name' => $content, 'nick_name' => $k ];
            Specialization::create($fields);
        }
    }
}
