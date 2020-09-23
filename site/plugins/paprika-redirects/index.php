<?php

Kirby::plugin('yalepaprika/paprika-redirects', [
  'routes' =>  [
            [
                'pattern' => 'articles/(:any)',
                'action' => function ($any) {
                    $folds = site()->find('folds');
                    $articles = $folds->grandChildren();
                    foreach ($articles as $article) {
                        if ($article->slug() == $any) {
                            go($article->url());
                        }
                    }
                    $this->next();
                }
            ],
            [
                'pattern' => 'archive/folds',
                'action' => function () {
                    go(site()->find('folds')->url());
                }
            ],
            [
                'pattern' => 'archive/articles',
                'action' => function () {
                    go('/articles');
                }
            ],
            [
                'pattern' => 'archive/contributors',
                'action' => function () {
                    go(site()->find('contributors')->url());
                }
            ]
        ]
]);
