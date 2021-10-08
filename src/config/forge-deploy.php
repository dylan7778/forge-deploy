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
        'production' => [
            'npm_build_type' => env('FD_PROD_NPM_TYPE', 'production'),
            'deployment_webhook' => env('FD_PROD_DEPLOY_HOOK', ''),
            'git_branch' => env('FD_PROD_GIT_BRANCH', 'master'),
        ],
        'staging' => [
            'npm_build_type' => env('FD_STAGING_NPM_TYPE', 'dev'),
            'deployment_webhook' => env('FD_STAGING_DEPLOY_HOOK', ''),
            'git_branch' => env('FD_STAGING_GIT_BRANCH', 'staging'),
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Required ENV Variables
    |--------------------------------------------------------------------------
    |
    | Here you may configure the different ENV variables that MUST be present to
    | build your deployments. If any of these variables are missing, the 
    | deployment will not be made. Array of String var names:
    |
    | e.g. ['MIX_PUSHER_APP_KEY','MIX_PUSHER_APP_CLUSTER']
    */

    'required_vars' => [
        // ['MIX_PUSHER_APP_KEY','MIX_PUSHER_APP_CLUSTER'],
    ],
];
