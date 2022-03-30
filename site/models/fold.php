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

    public function renderDataAttrs() {
        $attrs = [];

        if ($file = $this->files()->template('fold-front')->first()) {
            $attrs['data-front'] = $file->thumb([
            'width'   => 512,
            'height'  => 512,
            'quality' => 80
            ])->url();
        }

        if ($file = $this->files()->template('fold-back')->first()) {
            $attrs['data-back'] = $file->thumb([
            'width'   => 512,
            'height'  => 512,
            'quality' => 80
            ])->url();
        }

        $attrs['data-slug'] = $this->slug();

        return $attrs;
    }

    public function scene() {
        $folds = $this->kirby()->collection('folds/list');
        $scenes = $this->kirby()->collection('renderings/scenes');
        $index = $folds->count() - $this->indexOf($folds);
        return $scenes->nth($index % $scenes->count());
    }
}
