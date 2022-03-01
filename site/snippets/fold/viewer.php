<div id="fold-viewer" class="fold-viewer">
  <div class="fold-viewer-container box-card stack">
    <h6><em><?= $fold->title() ?></em> <span class="separator">·</span> Volume <?= $fold->volume() ?> <span class="separator">·</span> Issue <?= sprintf('%02d', $fold->number()->value()) ?></h6>
    <h6 id="fold-viewer-loading">
      <?= file_get_contents("assets/icons/rotate-cw.svg") ?>
    </h6>
    <h6>25in × 22.75in <span class="separator">·</span> Offset print on newsprint</h6>
  </div>
  <canvas
    id="fold-viewer-canvas"
    <?= Html::attr($fold->renderDataAttrs()) ?>
  ></canvas>
</div>
