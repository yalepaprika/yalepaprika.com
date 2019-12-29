<?php

Kirby::plugin('yalepaprika/pages-sorted-titles', [
    'pagesMethods' => [
        'sortedTitles' => function () {
            $titles = [];
            foreach($this as $page) {
                $titles[] = $page->title();
            }
            sort($titles);
            return implode(', ', $titles);
        }
    ]
]);