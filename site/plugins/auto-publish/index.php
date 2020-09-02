<?php

Kirby::plugin('yalepaprika/auto-publish', [
  'hooks' => [
    'page.create:after' => function ($page) {
        $autoPublish = $page->blueprint()->options()['autoPublish'] ?? false;
        if($autoPublish) {
            try {
                $page->changeStatus($autoPublish);
            } catch (Exception $e) {
                error_log("Error automatically listing " .  $page->id());
            }
        }
    }
  ]
]);
