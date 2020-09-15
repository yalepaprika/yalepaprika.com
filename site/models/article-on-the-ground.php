<?php
class ArticleOnTheGroundPage extends Page {
    public function formattedContributors() {
        $text = join(', ', $this->contributors()->toPages()->pluck('title'));
        return Str::excerpt($text);
    }
    public function formattedDate() {
        return $this->parent()->formattedDate();
    }
}
