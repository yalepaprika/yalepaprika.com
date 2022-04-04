<?php

return function ($site, $page) {

    $articles = $site->find('folds')->grandChildren()->filter(function($article) use ($page) {
        return $article->contributors()->toPages()->has($page);
    })->sortBy('publication_date', 'desc');;

    $folds = $site->find('folds')->children();
    $folds_as_fold_editor = $folds->filter(function($fold) use ($page) {
        return $fold->fold_editors()->toPages()->has($page);
    })->sortBy('publication_date', 'desc');;

    $folds_as_graphic_designer = $folds->filter(function($fold) use ($page) {
        return $fold->graphic_designers()->toPages()->has($page);
    })->sortBy('publication_date', 'desc');;

    $folds_as_coordinating_editor = $folds->filter(function($fold) use ($page) {
        return $fold->coordinating_editors()->toPages()->has($page);
    })->sortBy('publication_date', 'desc');;

    $folds_as_publisher = $folds->filter(function($fold) use ($page) {
        return $fold->publishers()->toPages()->has($page);
    })->sortBy('publication_date', 'desc');;

    $folds_as_archivist = $folds->filter(function($fold) use ($page) {
        return $fold->archivists()->toPages()->has($page);
    })->sortBy('publication_date', 'desc');;

    $folds_as_producer = $folds->filter(function($fold) use ($page) {
        return $fold->producers()->toPages()->has($page);
    })->sortBy('publication_date', 'desc');;

    $folds_as_graphic_design_liaison = $folds->filter(function($fold) use ($page) {
        return $fold->graphic_design_liaisons()->toPages()->has($page);
    })->sortBy('publication_date', 'desc');;

    $folds_as_web_editor = $folds->filter(function($fold) use ($page) {
        return $fold->web_editors()->toPages()->has($page);
    })->sortBy('publication_date', 'desc');;

    return [
        'articles' => $articles,
        'folds_as_fold_editor' => $folds_as_fold_editor,
        'folds_as_graphic_designer' => $folds_as_graphic_designer,
        'folds_as_coordinating_editor' => $folds_as_coordinating_editor,
        'folds_as_publisher' => $folds_as_publisher,
        'folds_as_archivist' => $folds_as_archivist,
        'folds_as_producer' => $folds_as_producer,
        'folds_as_graphic_design_liaison' => $folds_as_graphic_design_liaison,
        'folds_as_web_editor' => $folds_as_web_editor
    ];
};
