<?php snippet('folds/cards', [
  'folds' => $fold->moreByFoldEditors(),
  'title' => 'More by ' . pluralize('Fold Editor', $fold->fold_editors()->toPages()->count()),
  'compact' => true,
  'card_children' => function ($fold) {
    return snippet('utilities/detail-list/pages', [
      'title' => pluralize('Fold Editor', $fold->fold_editors()->toPages()->count()),
      'pages' => $fold->fold_editors()->toPages(),
      'show_title' => false,
      'inline' => 'true'
    ], true);
  }
]) ?>
<?php snippet('folds/cards', [
  'folds' => $fold->moreByGraphicDesigners(),
  'title' => 'More by ' . pluralize('Graphic Designer', $fold->graphic_designers()->toPages()->count()),
  'compact' => true,
  'card_children' => function ($fold) {
    return snippet('utilities/detail-list/pages', [
      'title' => pluralize('Graphic Designer', $fold->graphic_designers()->toPages()->count()),
      'pages' => $fold->graphic_designers()->toPages(),
      'show_title' => false,
      'inline' => 'true'
    ], true);
  }
]) ?>
