<?php

Kirby::plugin('yalepaprika/auto-list-contributors', [
  'hooks' => [
    'page.create:after' => function ($page) {
        try {
        	$page->changeStatus("unlisted");
	    } catch (Exception $e) {
	        error_log("Error automatically listing " .  $page->id());
	    }
    }
  ]
]);
