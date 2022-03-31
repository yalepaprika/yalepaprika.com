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

    public function preview() {
        $front = $this->files()->template('fold-front')->first();
        $back = $this->files()->template('fold-back')->first();
        $map = collection('renderings/previews')->first()->files()->template('preview-map')->first();
        if (is_null($front) || is_null($back) || is_null($map)) return null;
        $args = $back->url() . ' ';
        $args .= '-resize 888x1750\! ';
        $args .= '\( -clone 0,1 -append \) ';
        $args .= '\( -clone 1,0 -append -flop \) ';
        $args .= '-delete 0,1 ';
        $args .= $map->url() . ' ';
        $args .= '\( -clone 0,2 -alpha set -compose Distort -composite \) ';
        $args .= '\( -clone 1,2 -alpha set -compose Distort -composite \) ';
        $args .= '-delete 0,1 ';
        $args .= '\( -clone 1,2 -compose blend  -define compose:args=10 -composite \) ';
        $args .= '-delete 1,2 ';
        $args .= '\( -clone 0   -channel B -separate +channel \) ';
        $args .= '\( -clone 1,2 -compose Multiply -composite \) ';
        $args .= '-delete 1,2 ';
        $args .= '\( -clone 1,0 -compose DstIn -composite \) ';
        $args .= '-delete 0,1 ';
        $thumb = $front->thumb([
            'args' => $args,
            'argsName' => 'preview-back-' . $back->modified() . '-map-' . $map->modified() . '-v1',
            'width' => 888,
            'height' => 3500,
            'format' => 'png'
        ]);
        return $thumb;
    }

    public function scene() {
        $folds = $this->kirby()->collection('folds/list');
        $scenes = $this->kirby()->collection('renderings/scenes');
        $index = $folds->count() - $this->indexOf($folds);
        return $scenes->nth($index % $scenes->count());
    }
}
