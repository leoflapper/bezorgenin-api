<?php

return [
    'sneekbezorgt' => [
        'name' => 'Sneek Bezorgt',
        'url' => 'https://sneekbezorgt.nl',
        'privacy_url' => 'https://sneekbezorgt.nl/privacy',
        'terms' => 'https://sneekbezorgt.nl/privacy',
        'colors' => [
            'background-color' => '#f1f2f6',
            'primary-color' => '#2f3640'
        ],
        'cities' => [
            'sneek', 'ijlst', 'ysbrechtum', 'ijsbrechtum', 'drylst', 'snits', 'offingawier', 'scharnegoutum',
            'Sneek', 'Ijlst', 'Ysbrechtum', 'Ijsbrechtum', 'Drylst', 'Snits', 'Offingawier', 'Scharnegoutum'
        ],
    ],
    'frieslandbezorgt' => [
        'name' => 'Friesland Bezorgt',
        'url' => 'https://frieslandbezorgt.nl',
        'colors' => [
            'background-color' => '#f1f2f6',
            'primary-color' => '#2f3640'
        ],
        'cities' => '*',
    ],
    'localhost' => [
        'example_ids' => [
            1,2
        ]
    ],
    'cors' => [
        'sneekbezorgt.nl'
    ],
    'paths' => [
        'sneekbezorgtnl' => 'sneekbezorgt',
        'webezorgd.localhost' => 'sneekbezorgt'
    ]
];
