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
              <picture>
                <source srcset="<?= $preview->thumb(['width' => 360, 'format' => 'avif', 'quality' => 70])->url() ?>" type="image/avif">
                <source srcset="<?= $preview->thumb(['width' => 360, 'format' => 'webp', 'quality' => 80])->url() ?>" type="image/webp">
                <img src="<?= $preview->thumb(['width' => 360, 'quality' => 80])->url() ?>" alt="The cover of <?= $fold->title() ?>">
              </picture>
            </div>
          <?php endif ?>
        <?php else: ?>
          <?php if ($front = $fold->files()->template('fold-front')->first()): ?>
            <div
              class="fold-list-item__preview fold-list-item__preview--fallback <?= $front->ratio() > 1 ? "fold-list-item__preview--rotate" : "" ?>"
              style="--aspect-ratio: <?= $front->ratio() ?>; <?= $front->ratio() > 1 ? "aspect-ratio: " . $front->ratio() . " / 1;" : "" ?>"
            >
              <?php $dimension = $front->ratio() > 1 ? 'height' : 'width'; ?>
              <picture>
                <source srcset="<?= $front->thumb([$dimension => 360, 'format' => 'avif', 'quality' => 70])->url() ?>" type="image/avif">
                <source srcset="<?= $front->thumb([$dimension => 360, 'format' => 'webp', 'quality' => 80])->url() ?>" type="image/webp">
                <img src="<?= $front->thumb([$dimension => 360, 'quality' => 80])->url() ?>" alt="The cover of <?= $fold->title() ?>">
              </picture>
            </div>
          <?php endif ?>
        <?php endif ?>
      </div>
    </div>
  </div>
</div>
