<?php

return [

    'content_capabilities' => [
        'grades' => 'Grade@getList',
        'phone_numbers' => 'Phones@getNumbers'
    ],

    'physical_capabilities' => [
        'user_management.users' => 'grades|phone_numbers'
    ]

];
