<div class="fold-cover <?= ($page->url() == $fold->url() ) ? 'fold-cover-fold-page' : '' ?> box-card box-card-inverted">
  <div
    class="fold-cover-background fold-cover-background-hidden"
    style="<?= $fold->scene()->backgroundStyle() ?>"
  >
    <div
      class="fold-cover-background-image"
      style="<?= $fold->scene()->backgroundImageStyle() ?>"
    >
      <div
        class="fold-cover-background-mask"
        style="<?= $fold->scene()->backgroundMaskStyle() ?>"
      >
        <canvas
          class="fold-cover-background-canvas"
          <?= Html::attr($fold->renderDataAttrs()) ?>
          <?= Html::attr($fold->scene()->renderDataAttrs()) ?>
        ></canvas>
      </div>
    </div>
  </div>
  <div class="fold-cover-main stack stack-space-between">
    <div class="fold-cover-top cluster cluster-switcher">
      <div class="_cluster">
        <div class="fold-cover-title stack stack-small">
          <h1><a href="<?= $fold->url() ?>"><?= $fold->title() ?></a></h1>
          <h4>Volume <?= $fold->volume() ?> <span class="separator">·</span> Issue <?= sprintf('%02d', $fold->number()->value()) ?></h4>
        </div>
        <div class="fold-cover-info">
          <h4><?= $fold->formattedDate() ?></h4>
          <h4><?= $fold->children()->count() ?> article<?= $fold->children()->count() == 1 ? '' : 's' ?></h4>
        </div>
      </div>
    </div>
    <div class="fold-cover-bottom">
      <a class="fold-cover-read-more button button-primary" href="<?= $fold->url() ?>">Read More →</a>
    </div>
  </div>
</div>
