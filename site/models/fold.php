<?php
class FoldPage extends Page {
    public function children() {
        $children = parent::children();
        if ($this->website()->isEmpty()) {
            return $children;
        }
        $embed = Page::factory([
            'slug' => 'embed',
            'parent' => $this,
            'template' => 'embed',
            'model' => 'embed',
            'content' => [
                'title' => $this->title() . ' Website',
                'website' => $this->website(),
                'description' => 'Visit the online edition of <em>' . $this->title(). '</em>, a custom website designed for this issue.',
                'text' => $this->title() . ' Website'
            ]
        ]);
        $children->append($embed);
        return $children;
    }

    public function embedPage() {
        $children = $this->children();
        $embed = $children->template('embed')->first();
        return $embed;
    }

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

    public function sortable_date() {
        return $this->publication_date()->toDate('Y-m-d', 'now');
    }

    public function formattedDate() {
        return $this->publication_date()->toDate('F j, Y');
    }
}
