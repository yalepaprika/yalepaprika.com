<div class="fold-subtitle">
  <div>
    <span class="d-none d-lg-block">Volume <?= $fold->volume() ?>, Issue <?= sprintf('%02d', $fold->number()->value()) ?></span>
    <span class="d-lg-none" aria-hidden="true">Vol. <?= $fold->volume() ?>, No. <?= sprintf('%02d', $fold->number()->value()) ?></span>
  </div>
  <div>
    <span class="d-none d-lg-block"><?= $fold->formattedDate() ?></span>
    <span class="d-lg-none" aria-hidden="true"><?= $fold->formattedDateShort() ?></span>
  </div>
</div>
