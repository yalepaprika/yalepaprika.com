<?php
  $attrs = [];
  if ($file = $fold->files()->template('fold-front')->first()) {
    $attrs['data-front'] = $file->thumb([
      'width'   => 800,
      'height'  => 800,
      'quality' => 80
    ])->url();
  }
  if ($file = $fold->files()->template('fold-back')->first()) {
    $attrs['data-back'] = $file->thumb([
      'width'   => 800,
      'height'  => 800,
      'quality' => 80
    ])->url();
  }
?>
<div id="fold-viewer" class="fold-viewer">
  <canvas id="fold-viewer-canvas" <?= Html::attr($attrs) ?>></canvas>
</div>
