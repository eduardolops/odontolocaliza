<?php

use Illuminate\Database\Seeder;

class InfoComplementarySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $info = [
            [ 
            	'info_name' => 'Apresentação',
            	'image'     => 'fa-id-card-o',
            	'status'    => 1
            ],
            [ 
            	'info_name' => 'Formação Acadêmica',
            	'image'     => 'fa-graduation-cap',
            	'status'    => 1
            ],
            [ 
            	'info_name' => 'Qualificações',
            	'image'     => 'fa-trophy',
            	'status'    => 1
            ],
            [ 
            	'info_name' => 'Publicações',
            	'image'     => 'fa-book',
            	'status'    => 1
            ]
        ];
        DB::table("info_complementaries")->insert($info);
    }
}
