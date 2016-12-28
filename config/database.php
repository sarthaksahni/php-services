<?php

return [
    "default" =>  env("DEFAULT_DB", "mongodb"),
    "connections" => [
        "mongodb" => [
            "driver" => "mongodb",
            "host"  =>  env("MONGODB_HOST", "localhost"),
            "port"  =>  env("MONGODB_PORT", "27017"),
            "database"  =>  env("MONGODB_DB", "pseudo"),
        ],
        "mongodbsecond" => [
            "driver" => "mongodb",
            "host"  =>  env("MONGODB_HOST", "localhost"),
            "port"  =>  env("MONGODB_PORT", "27017"),
            "database"  =>  env("MONGODB_DB", "pseudogame"),
        ]
    ]
];
