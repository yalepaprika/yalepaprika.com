<?php snippet('folds/cards', [
  'folds' => $folds,
  'title' => 'Recent Folds',
  'children' => snippet('page/more', ['model' => 'Fold', 'href' => $parent->url()], true)
]) ?>
