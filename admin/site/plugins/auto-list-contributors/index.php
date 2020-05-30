<?php

Kirby::plugin('yalepaprika/auto-list-contributors', [
  'hooks' => [
    'page.create:after' => function ($page) {
        if($page->blueprint()->name() == 'pages/contributor') {
            try {
                $page->changeStatus("unlisted");
            } catch (Exception $e) {
                error_log("Error automatically listing " .  $page->id());
            }
        }
    }
  ]
]);
