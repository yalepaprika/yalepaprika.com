<?php

function findArticleBySlug($slug, $code = 301) {
    $folds = site()->find('folds');
    $articles = $folds->grandChildren();
    foreach ($articles as $article) {
        if ($article->slug() == $slug) {
            go($article->url(), $code);
        }
    }
}

Kirby::plugin('yalepaprika/paprika-redirects', [
  'routes' =>  [
            [
                'pattern' => 'articles/(:any)',
                'action' => function ($any) {
                    findArticleBySlug($any);
                    $this->next();
                }
            ],
            [
                'pattern' => 'archive/folds',
                'action' => function () {
                    go(site()->find('folds')->url(), 301);
                }
            ],
            [
                'pattern' => 'archive/articles',
                'action' => function () {
                    go('/articles', 301);
                }
            ],
            [
                'pattern' => 'archive/contributors',
                'action' => function () {
                    go(site()->find('contributors')->url(), 301);
                }
            ],
            [
                'pattern' => '(:any)',
                'action' => function ($any) {
                    findArticleBySlug($any);
                    $this->next();
                }
            ],
        ]
]);
