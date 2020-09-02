<?php

return function ($site, $page) {

    $articles = $site->find('folds')->grandChildren()->filter(function($fold) use ($page) {
        return $fold->contributors()->toPages()->has($page);
    });

    return [
        'articles' => $articles
    ];
};
