<?php

Kirby::plugin('yalepaprika/logout-route', [
    'routes' => [
        [
            'pattern' => 'logout',
            'action'  => function() {

                if ($user = kirby()->user()) {
                    $user->logout();
                }

                go('/');

            }
        ]
    ]
]);
