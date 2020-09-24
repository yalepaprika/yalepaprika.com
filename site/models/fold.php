<?php
class FoldPage extends Page {
    public function contributorsSummary() {
        $articles = $this->children();
        $contributors = [];
        foreach ($articles as $article) {
            foreach ($article->contributors()->toPages() as $contributor) {
                $contributors[$contributor->title()->toString()] = true;
            }
        }
        $excerpts = array_slice(array_keys($contributors), 0, 10);
        $text = join(', ', $excerpts);
        return $text;
    }

    public function formattedDate() {
        return $this->publication_date()->toDate('F j, Y');
    }
}
