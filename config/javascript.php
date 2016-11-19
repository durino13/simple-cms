<?php

/*
|--------------------------------------------------------------------------
| Sharing variables between PHP & javascript
|--------------------------------------------------------------------------
|
| This way, we can inject PHP variables into javascript. This file
| is read in main.blade.php file and the values of this file are
| printed into a <script> tag in the index.php file ..
|
*/

return [

    'general' => [
        'baseURL' => json_encode(env('APP_URL'))
    ],

    'datatables' => [

        // Select filter columns
        'filterColumnsIndexes' => [2, 3],

        // Number to icon conversion
        'articleStatusColumnIndex' => 4,

        // Sort columns
        'articleSortColumnIndex' => 5,
        'categorySortColumnIndex' => 3

    ],

    'tinymce' => [

        // Readmore button
        'readmore' => '{!--readmore--!}'

    ]

];