<?php
class ScenePage extends Page {
    public function backgroundImage() {
        return $this->files()->template('scene-background')->first();
    }

    public function backgroundMask() {
        return $this->files()->template('scene-mask')->first();
    }

    public function backgroundModel() {
        return $this->files()->template('scene-model')->first();
    }

    public function backgroundStyle() {
        $style = '';

        switch ($this->vertical()) {
            case 'top':
                $style .= 'align-items: start; ';
                break;
            case 'bottom':
                $style .= 'align-items: end; ';
                break;
            default:
                $style .= 'align-items: center; ';
        }

        switch ($this->horizontal()) {
            case 'left':
                $style .= 'justify-content: flex-start; ';
                break;
            case 'right':
                $style .= 'justify-content: flex-end; ';
                break;
            default:
                $style .= 'justify-content: center; ';
        }

        return $style;
    }

    public function backgroundImageStyle() {
        $style = '';

        if ($file = $this->backgroundImage()) {
            $style .= 'background: url(' . $file->thumb([
              'width'   => 2048,
              'height'  => 2048,
              'quality' => 80
            ])->url() . '); ';
            $style .= 'background-size: 100%; ';
        }

        return $style;
    }

    public function backgroundMaskStyle() {
        $style = '';

        if ($file = $this->backgroundMask()) {
            $url = $file->thumb([
              'width'   => 2048,
              'height'  => 2048,
              'quality' => 80
            ])->url();

            $style .= '-webkit-mask-image: url(' . $url . '); ';
            $style .= 'mask-image: url(' . $url . '); ';
            $style .= '-webkit-mask-size: 100%; ';
            $style .= 'mask-size: 100%; ';
        }
        
        return $style;
    }

    public function dataAttrs() {
        $attrs = [];

        if ($file = $this->backgroundModel()) {
            $attrs['data-model'] = $file->url();
        }

        $attrs['data-brightness'] = $this->brightness();
        $attrs['data-bleed'] = $this->bleed();

        return $attrs;
    }
}