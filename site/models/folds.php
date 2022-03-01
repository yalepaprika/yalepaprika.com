<?php
class FoldsPage extends Page {
      public function gridStyle($layout) {
        $style = '';

        if ($layout['setWidth']) {
            $style .= 'width: ' . $layout['width'] . 'vw; ';
        } else {
            $style .= 'height: ' . $layout['height'] . 'vw; ';
        }
        
        return $style;
    }
}