<?php

return [
    'supported_locales' => ['en', 'am', 'om'],
    
    'locales' => [
        'en' => [
            'name' => 'English',
            'native' => 'English',
            'flag' => '🇬🇧',
            'script' => 'Latn',
            'dir' => 'ltr',
        ],
        'am' => [
            'name' => 'Amharic',
            'native' => 'አማርኛ',
            'flag' => '🇪🇹',
            'script' => 'Ethi',
            'dir' => 'ltr',
        ],
        'om' => [
            'name' => 'Afaan Oromo',
            'native' => 'Afaan Oromoo',
            'flag' => '🇪🇹',
            'script' => 'Latn',
            'dir' => 'ltr',
        ],
    ],

    'fallback_locale' => 'en',
    
    'hide_default_in_url' => false,
    
    'currency' => [
        'en' => 'USD',
        'am' => 'ETB',
        'om' => 'ETB',
    ],
    
    'date_format' => [
        'en' => 'M d, Y',
        'am' => 'd/m/Y',
        'om' => 'd/m/Y',
    ],
];
