<?php

return [

    'general' => [
        'baseURL' => url('/')
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