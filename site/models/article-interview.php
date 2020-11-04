<?php
class ArticleInterviewPage extends Page {
    public function formattedContributors() {
        $text = join(', ', $this->contributors()->toPages()->pluck('title'));
        return Str::excerpt($text, 70);
    }
    public function formattedDate() {
        return $this->parent()->formattedDate();
    }
    public function templateName() {
        return 'Interview';
    }
}
