<div class="fold-list-item col space-inside-after-20">
  <div class="rule card h-100">
    <div class="h-100 d-flex flex-column justify-content-between">
      <div>
        <?php snippet('fold/header', ['fold' => $fold]) ?>
      </div>
      <?php if ($fold->isBroadsheet()): ?>
        <div class="fold-list-item__preview space-before-20">
          <?php if ($preview = $fold->files()->template('fold-preview')->first()): ?>
            <img src="<?= $preview->url() ?>" />
          <?php endif ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>
