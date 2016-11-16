<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'kpidata' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=127.0.0.1;dbname=data',
                    'user'       => 'root',
                    'password'   => 'system021080',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'kpidata',
            'connections' => ['kpidata']
        ],
        'generator' => [
            'defaultConnection' => 'kpidata',
            'connections' => ['kpidata']
        ]
    ]
];