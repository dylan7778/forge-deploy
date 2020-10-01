<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Base Directory
    |--------------------------------------------------------------------------
    |
    | The absolute path to your project on your local filesystem
    | (e.g. /Users/user/php/project-name)
    |
    */

    'base_directory' => env('FD_BASE_DIRECTORY', ''),

    /*
    |--------------------------------------------------------------------------
    | Environments
    |--------------------------------------------------------------------------
    |
    | Here you may configure the different environments that can be deployed.
    |
    | Available Environments: "production", "staging"
    |
    */

    'environments' => [
        'prod' => [
            'environment_type' => 'production',
            'npm_build_type' => env('FD_PROD_NPM_TYPE', 'production'),
            'deployment_webhook' => '',
        ],
        'staging' => [
            'environment_type' => 'staging',
            'npm_build_type' => env('FD_STAGING_NPM_TYPE', 'dev'),
            'deployment_webhook' => ''
        ],
    ],

];
