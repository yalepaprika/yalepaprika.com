<div class="fold-list-item col space-inside-after-40">
  <div class="rule card h-100">
    <div class="h-100 d-flex flex-column">
      <div>
        <?php snippet('fold/header', ['fold' => $fold]) ?>
      </div>
      <div class="fold-list-item__container space-before-20 space-after-20 <?= $fold->isBroadsheet() ? "" : "space-inside-before-10" ?>">
        <?php if ($fold->isBroadsheet()): ?>
          <?php if ($preview = $fold->files()->template('fold-preview')->first()): ?>
            <div class="fold-list-item__preview fold-list-item__preview--broadsheet">
              <img src="<?= $preview->url() ?>" />
            </div>
          <?php endif ?>
        <?php else: ?>
          <?php if ($front = $fold->files()->template('fold-front')->first()): ?>
            <div
              class="fold-list-item__preview fold-list-item__preview--fallback <?= $front->ratio() > 1 ? "fold-list-item__preview--rotate" : "" ?>"
              style="--aspect-ratio: calc(<?= $front->width() ?> / <?= $front->height() ?>); <?= $front->ratio() > 1 ? "aspect-ratio: " . $front->height() . " / " . $front->width() . ";" : "" ?>"
            >
              <img src="<?= $front->url() ?>" />
            </div>
          <?php endif ?>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>
