<div
  id="folds-grid"
  class="folds-grid"
  style="<?= $page->gridStyle($layout) ?>"
  data-layout='<?= json_encode($layout) ?>'
>
  <?php foreach($folds as $fold): ?>
    <?php snippet('fold/grid-item', [
      'fold' => $fold,
      'layout' => $fold->getLayoutItem($layout, $folds)
    ]) ?>
  <?php endforeach ?>
</div>
