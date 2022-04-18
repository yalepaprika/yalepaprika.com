<?php

class ArticlePage extends Page {

    public function related() {
        $contributors = $this->contributors()->toPages();

        if ($contributors->isEmpty()) {
            return new Pages();
        }

        $articles = kirby()->site()->find('folds')->grandChildren()->filter(function($article) use ($contributors) {
            if ($this->id() === $article->id()) {
                return false;
            }
            $match = false;
            foreach($contributors as $contributor) {
                if ($article->contributors()->toPages()->has($contributor)) {
                    $match = true;
                }
            }
            return $match;
        })->sortBy('publication_date', 'desc');

        return $articles;
    }
}
