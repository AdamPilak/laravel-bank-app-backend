<?php

return [
    'model_defaults' => [
        'namespace'       => 'App\Models',
        'base_class_name' => \Illuminate\Database\Eloquent\Model::class,
        'output_path'     => 'Models',
        'no_timestamps'   => null,
        'date_format'     => 'Y-m-d H:m:s',
        'connection'      => null,
        'backup'          => null,
    ],
];