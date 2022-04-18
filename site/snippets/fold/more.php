<?php snippet('folds/cards', [
  'folds' => $fold->moreByFoldEditors(),
  'title' => 'More by ' . pluralize('Fold Editor', $fold->fold_editors()->toPages()->count()),
  'compact' => true,
  'card_children' => function ($fold) {
    return snippet('page/role', [
      'title' => 'Fold Editor',
      'pages' => $fold->fold_editors()->toPages(),
      'inline' => 'true'
    ], true);
  }
]) ?>
<?php snippet('folds/cards', [
  'folds' => $fold->moreByGraphicDesigners(),
  'title' => 'More by ' . pluralize('Graphic Designer', $fold->graphic_designers()->toPages()->count()),
  'compact' => true,
  'card_children' => function ($fold) {
    return snippet('page/role', [
      'title' => 'Graphic Designer',
      'pages' => $fold->graphic_designers()->toPages(),
      'inline' => 'true'
    ], true);
  }
]) ?>
