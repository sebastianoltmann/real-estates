<?php

$adminPrefix = \App\Providers\RouteServiceProvider::NAME_ADMIN;

return [
    "create" => "create",
    "edit" => "edit",

    "users" => [
        "index" => "{$adminPrefix}/users",
        "store" => "{$adminPrefix}/users",
        "create" => "{$adminPrefix}/users/create",
        "edit" => "{$adminPrefix}/users/{user}/edit",
        "show" => "{$adminPrefix}/users/{user}",
        "update" => "{$adminPrefix}/users/{user}",
        "destroy" => "{$adminPrefix}/users/{user}",
    ],

    "documents" => [
        "index" => "{$adminPrefix}/documents",
        "store" => "{$adminPrefix}/documents",
        "create" => "{$adminPrefix}/documents/create",
        "edit" => "{$adminPrefix}/documents/{document}/edit",
        "show" => "{$adminPrefix}/documents/{document}",
        "update" => "{$adminPrefix}/documents/{document}",
        "destroy" => "{$adminPrefix}/documents/{document}",
    ],

    "real-estates" => [
        "index" => "{$adminPrefix}/real-estates",
        "store" => "{$adminPrefix}/real-estates",
        "create" => "{$adminPrefix}/real-estates/create",
        "edit" => "{$adminPrefix}/real-estates/{real_estate}/edit",
        "show" => "{$adminPrefix}/real-estates/{real_estate}",
        "update" => "{$adminPrefix}/real-estates/{real_estate}",
        "destroy" => "{$adminPrefix}/real-estates/{real_estate}",

        // Nested routes
        "documents" => [
            "index" => "{$adminPrefix}/real-estates/{real_estate}/documents",
            "store" => "{$adminPrefix}/real-estates/{real_estate}/documents",
            "create" => "{$adminPrefix}/real-estates/{real_estate}/documents/create",
            "edit" => "{$adminPrefix}/real-estates/{real_estate}/documents/{document}/edit",
            "update" => "{$adminPrefix}/real-estates/{real_estate}/documents/{document}",
            "destroy" => "{$adminPrefix}/real-estates/{real_estate}/documents/{document}"
        ],
    ],

    "projects" => "projects",

    'trash' => [
        'index' => "{$adminPrefix}/trash/{resource?}",
        'restore' => "{$adminPrefix}/trash/{resource}/restore/{model}",
        'forceDelete' => "{$adminPrefix}/trash/{resource}/force-delete/{model}",
    ]

];
