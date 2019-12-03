<?php

return [

    'content_capabilities' => [
        'grades' => 'Grade@getList',
        'phone_numbers' => 'Phones@getNumbers'
    ],

    'physical_capabilities' => [
        'education_system.grades' => 'grades|phone_numbers'
    ]

];
