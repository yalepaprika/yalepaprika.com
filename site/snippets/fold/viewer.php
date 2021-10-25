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
  <div class="fold-viewer-container box-card stack">
    <h6><em><?= $fold->title() ?></em> <span class="separator">·</span> Volume <?= $fold->volume() ?> <span class="separator">·</span> Issue <?= sprintf('%02d', $fold->number()->value()) ?></h6>
    <h6>25in × 22.75in <span class="separator">·</span> Offset print on newsprint</h6>
  </div>
  <canvas id="fold-viewer-canvas" <?= Html::attr($attrs) ?>></canvas>
</div>
