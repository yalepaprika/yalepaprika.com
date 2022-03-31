<div class="fold-list-item col card">
  <div class="space-after-80">
    <div class="rule">
      <?php snippet('fold/header', ['fold' => $fold]) ?>
      <div class="fold-list-item__preview">
        <?php if ($preview = $fold->files()->template('fold-preview')->first()): ?>
          <img src="<?= $preview->url() ?>" />
        <?php endif ?>
      </div>
    </div>
  </div>
</div>