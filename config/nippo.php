<?php

return [
    'host' => env('NIPPO_COUNT_HOST_NAME', 'nippo_count_host_name'),
    'slack' => [
        'hook_token' => env('SLACK_HOOK_TOKEN', 'slack_hook_token'),
    ],
    'esa' => [
        'team' => env('ESA_TEAM_NAME', 'esa_team_name'),
        'access_token' => env('ESA_ACCESS_TOKEN', 'esa_access_token'),
    ],
];
