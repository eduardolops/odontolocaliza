<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Odontolocaliza - Seu Guia Odontológico", // set false to total remove
            'description'  => 'A Odontolocaliza é um Guia Odontológico Online, onde você encontra os melhores profissionais por atuação de Especialidades, Planos odontológicos e Cidades.', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => ['dentista', 'odontologia', 'odontologico', 'dentes', 'doutor', 'saúde', 'saúde bucal', 'odonto', 'localiza'],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'        => "Odontolocaliza - Seu Guia Odontológico", // set false to total remove
            'description'  => 'A Odontolocaliza é um Guia Odontológico Online, onde você encontra os melhores profissionais por atuação de Especialidades, Planos odontológicos e Cidades.',  // set false to total remove
            'url'         => false, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => false,
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];
