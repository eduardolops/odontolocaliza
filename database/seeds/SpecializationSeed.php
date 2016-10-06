<?php

use Illuminate\Database\Seeder;

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
        $now = date("Y-m-d H:i:s");
        
        foreach($contents as $k => $content){
            $fields = [ 'name' => $content, 'nick_name' => $k, "created_at" => $now, "updated_at" => $now, ];
            DB::table("specializations")->insert($fields);
        }
    }
}
