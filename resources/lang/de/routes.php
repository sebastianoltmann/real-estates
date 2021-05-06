<?php

$adminPrefix = \App\Providers\RouteServiceProvider::NAME_ADMIN;

return [
    'create' => 'erstellen',
    'edit' => 'bearbeiten',

    'users' => [
        "index" => "{$adminPrefix}/benutzer",
        "store" => "{$adminPrefix}/benutzer",
        "create" => "{$adminPrefix}/benutzer/erstellen",
        "edit" => "{$adminPrefix}/benutzer/{user}/bearbeiten",
        "show" => "{$adminPrefix}/benutzer/{user}",
        "update" => "{$adminPrefix}/benutzer/{user}",
        "destroy" => "{$adminPrefix}/benutzer/{user}",
    ],

    "documents" => [
        "index" => "{$adminPrefix}/unterlagen",
        "store" => "{$adminPrefix}/unterlagen",
        "create" => "{$adminPrefix}/unterlagen/erstellen",
        "edit" => "{$adminPrefix}/unterlagen/{document}/bearbeiten",
        "show" => "{$adminPrefix}/unterlagen/{document}",
        "update" => "{$adminPrefix}/unterlagen/{document}",
        "destroy" => "{$adminPrefix}/unterlagen/{document}",
    ],

    "real-estates" => [
        "index" => "{$adminPrefix}/immobilien",
        "store" => "{$adminPrefix}/immobilien",
        "create" => "{$adminPrefix}/immobilien/erstellen",
        "edit" => "{$adminPrefix}/immobilien/{real_estate}/bearbeiten",
        "show" => "{$adminPrefix}/immobilien/{real_estate}",
        "update" => "{$adminPrefix}/immobilien/{real_estate}",
        "destroy" => "{$adminPrefix}/immobilien/{real_estate}",

        // Nested routes
        "documents" => [
            "index" => "{$adminPrefix}/immobilien/{real_estate}/unterlagen",
            "store" => "{$adminPrefix}/immobilien/{real_estate}/unterlagen",
            "create" => "{$adminPrefix}/immobilien/{real_estate}/unterlagen/erstellen",
            "edit" => "{$adminPrefix}/immobilien/{real_estate}/unterlagen/{document}/bearbeiten",
            "update" => "{$adminPrefix}/immobilien/{real_estate}/unterlagen/{document}",
            "destroy" => "{$adminPrefix}/immobilien/{real_estate}/unterlagen/{document}"
        ],
    ],

    'projects' => 'projekte',

    'trash' => [
        'index' => "{$adminPrefix}/mull/{resource?}",
        'restore' => "{$adminPrefix}/mull/{resource}/wiederherstellen/{model}",
        'forceDelete' => "{$adminPrefix}/mull/{resource}/loschen-erzwingen/{model}",
    ]

];
