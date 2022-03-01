<?php

class FoldPage extends Page {

    public function __construct($parent) {
        parent::__construct($parent);
        // QUARTER, HALF, or FULL
        $this->randomSpreadIndex = rand(0, 2);
    }

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

    public function getLayoutItem($layout, $folds) {
        $index = $this->indexOf($folds);
        return [
            'width' => $layout['slotSizes'][$index * 2],
            'height' => $layout['slotSizes'][$index * 2 + 1],
            'left' => $layout['slots'][$index * 2],
            'top' => $layout['slots'][$index * 2 + 1]
        ];
    }

    public function gridItemStyle($layout) {
        $style = '';

        $style .= 'width: ' . $layout['width'] . 'vw; ';
        $style .= 'height: ' . $layout['height'] . 'vw; ';
        $style .= 'left: ' . $layout['left'] . 'vw; ';
        $style .= 'top: ' . $layout['top'] . 'vw; ';


        switch ($this->randomSpreadIndex) {
            case 0:
                $style .= 'padding: 3.75%; ';
                break;
            case 1:
                $style .= 'padding: 3.75%; ';
                break;
            default:
                $style .= 'padding: 7.5%; ';
        }

        return $style;
    }

    public function gridItemAspectRatioStyle() {
        $style = '';

        switch ($this->randomSpreadIndex) {
            case 0:
                $style .= 'aspect-ratio: 1 / 1; ';
                break;
            case 1:
                $style .= 'aspect-ratio: 1 / 2; ';
                break;
            default:
                $style .= 'aspect-ratio: 1 / 1; ';
        }

        return $style;
    }

    public function renderDataAttrs() {
        $attrs = [];

        if ($file = $this->files()->template('fold-front')->first()) {
            $attrs['data-front'] = $file->thumb([
            'width'   => 1024,
            'height'  => 1024,
            'quality' => 80
            ])->url();
        }

        if ($file = $this->files()->template('fold-back')->first()) {
            $attrs['data-back'] = $file->thumb([
            'width'   => 1024,
            'height'  => 1024,
            'quality' => 80
            ])->url();
        }

        return $attrs;
    }

    public function scene() {
        $folds = $this->kirby()->collection('folds');
        $scenes = $this->kirby()->collection('scenes');
        $index = $folds->count() - $this->indexOf($folds);
        return $scenes->nth($index % $scenes->count());
    }
}
