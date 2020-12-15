<?php

return [
    
    /**
     * PLN Identity and Access Management
     */

    'client_id' => env('SSO_APP_ID'),
    'client_secret' => env('SSO_APP_SECRET'),
    'redirect_uri' => env('SSO_APP_REDIRECT'),
    'logout_uri' => env('SSO_APP_LOGOUT_REDIRECT'),
    'api_key' => env('SSO_API_KEY'),

];