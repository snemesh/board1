<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'kpidata' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=board.intersog.com;dbname=data',
                    'user'       => 'root',
                    'password'   => '',
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
