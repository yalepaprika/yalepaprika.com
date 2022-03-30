<?php

return function ($site) {
    return $site->find('folds')->children()->sortBy('publication_date', 'desc')->children()->group(function ($article) {
        return $article->parent()->title();
    });
};
