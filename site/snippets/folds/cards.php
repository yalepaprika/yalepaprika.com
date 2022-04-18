<?php if ($folds->isNotEmpty()): ?>
  <div class="folds-cards space-after-80">
    <?php snippet('utilities/heading', [
      'title' => $title ?? 'Folds',
      'subtitle' => quantify('Fold', $folds->count()),
    ]) ?>
    <div class="container-xxxl">
      <div class="row row-cols-2 row-cols-md-4 align-items-stretch">
        <?php foreach ($folds as $fold): ?>
          <?php snippet('fold/card', [ 'fold' => $fold ]) ?>
        <?php endforeach ?>
      </div>
    </div>
    <?php if (isset($children)): ?>
      <?= $children ?>
    <?php endif ?>
  </div>
<?php endif ?>
