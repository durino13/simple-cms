<?php

return [

    'action_buttons' => [
        'archive' => ['administrator','administrator/article'],
        'restore' => ['administrator/archive','administrator/trash'],
        'trash' => ['administrator/article', 'administrator/archive','administrator'],
        'wipe' => ['administrator/trash']
    ]

];