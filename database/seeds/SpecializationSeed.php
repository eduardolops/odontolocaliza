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
            'CD'    => 'Cirurgião Dentista',
            'TPD'   => 'Técnico em Prótese Dentaria',
            'TSB'   => 'Técnico em Saúde Bucal',
            'ABS'   => 'Auxiliar em Saúde Bucal',
            'APD'   => 'Auxiliar de Prótese Dentaria',
            'CL'    => 'Clinica Odontológica',
            'LB'    => 'Laboratório',
            'CTBMF' => 'Cirurgia e Traumatologia Buco Maxilo Facial',
            'DD'    => 'Dentística',
            'DTMD'  => 'Disfunção Têmporo Mandibular e Dor Orofacial',
            'EDD'   => 'Endodontia',
            'EL'    => 'Estomatologia',
            'IRO'   => 'Imaginologia e Radiologia Odontológica',
            'IP'    => 'Implantodontia',
            'OL'    => 'Odontologia Legal',
            'OT'    => 'Odontologia do Trabalho',
            'OPNE'  => 'Odontologia para Pacientes com Necessidades Especiais',
            'OTG'   => 'Odontogeriatria',
            'OTP'   => 'Odontopediatria',
            'OTA'   => 'Ortodontia',
            'OFM'   => 'Ortopedia Funcional dos Maxilares',
            'PB'    => 'Patologia Bucal',
            'PO'    => 'Periodontia',
            'PBMF'  => 'Prótese Buco Maxilo Facial',
            'PD'    => 'Prótese Dentária',
            'SC'    => 'Saúde Coletiva',

        ];
        $now = date("Y-m-d H:i:s");
        
        foreach($contents as $k => $content){
            $fields = [ 'name' => $content, 'nick_name' => $k, "created_at" => $now, "updated_at" => $now, ];
            DB::table("specializations")->insert($fields);
        }
    }
}
