<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Settings Moodle API Connections
    |--------------------------------------------------------------------------
    | Here you may configure your settings for Moodle API Connection (token, url, etc)
    |
    |
    */

    'moodle_rest_api_url' => env('MOODLE_REST_API_URL', 'http://plataforma-arrow.online/webservice/rest/server.php'),
    'moodle_rest_api_token' => env('MOODLE_REST_API_TOKEN', ''),

];