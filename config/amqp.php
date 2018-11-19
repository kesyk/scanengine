<?php

return [

    'use' => 'production',

    'properties' => [

        'production' => [
            'host'                => '127.0.0.1',
            'port'                => 5672,
            'username'            => 'guest',
            'password'            => 'guest',
            'exchange'            => 'amq.topic',
            'exchange_type'       => 'topic',
            'consumer_tag'        => 'consumer',
            'queue_properties'    => ['x-ha-policy' => ['S', 'all']],
            'exchange_properties' => [],
            'timeout'             => 0
        ],

    ],

];