<?php if ($folds->isNotEmpty()): ?>
  <div class="folds-cards space-after-80">
    <?php snippet('utilities/heading', [
      'title' => $title ?? 'Folds',
      'subtitle' => quantify('Fold', $folds->count()),
    ]) ?>
    <div class="container-xxxl">
      <div class="row row-cols-2 row-cols-md-4 align-items-stretch">
        <?php foreach ($folds as $fold): ?>
          <?php if ( isset($card_children) ): ?>
            <?php snippet('fold/card', [ 'fold' => $fold, 'compact' => $compact ?? false, 'children' => $card_children($fold) ]) ?>
          <?php else: ?>
            <?php snippet('fold/card', [ 'fold' => $fold, 'compact' => $compact ?? false ]) ?>
          <?php endif ?>
        <?php endforeach ?>
      </div>
    </div>
    <?php if (isset($children)): ?>
      <?= $children ?>
    <?php endif ?>
  </div>
<?php endif ?>
