<?php if ($folds->isNotEmpty()): ?>
  <div class="folds-list space-after-20">
    <?php snippet('utilities/heading', [
      'title' => $title ?? 'Folds',
      'subtitle' => quantify('Fold', $folds->count())
    ]) ?>
    <div class="container-xxxl">
      <div class="folds-list__container">
        <div class="row row-cols-2 row-cols-md-4 gx-0">
          <?php foreach ($folds as $fold): ?>
            <?php snippet('fold/list-item', [
              'fold' => $fold
            ]) ?>
          <?php endforeach ?>
        </div>
      </div>
    </div>
  </div>
<?php endif ?>