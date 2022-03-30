<?php $element = $as ?? 'h3'; ?>
<<?= $element ?>>
  <a href="<?= $fold->url() ?>" class="card-target">
    <?= removeorphans($fold->title(), 5) ?>
  </a>
</<?= $element ?>>
<div class="font--secondary">
  <?php snippet('fold/subtitle', ['fold' => $fold]) ?>
</div>
