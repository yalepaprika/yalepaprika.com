<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <article>
        <?php snippet('page/title', ['title' => $page->title()]) ?>
        <div>
          <?php snippet('contributor/details', ['page' => $page]) ?>
          <div>
            <?php snippet('articles/list', ['title' => 'Contributor', 'articles' => $articles]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Fold Editor',
              'folds' => $folds_as_fold_editor,
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
              'title' => 'Graphic Designer',
              'folds' => $folds_as_graphic_designer,
              'card_children' => function ($fold) {
                  return snippet('utilities/detail-list/pages', [
                    'title' => pluralize('Graphic Designer', $fold->graphic_designers()->toPages()->count()),
                    'pages' => $fold->graphic_designers()->toPages(),
                    'show_title' => false,
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Coordinating Editor',
              'folds' => $folds_as_coordinating_editor,
              'card_children' => function ($fold) {
                  return snippet('utilities/detail-list/pages', [
                    'title' => pluralize('Coordinating Editors', $fold->coordinating_editors()->toPages()->count()),
                    'pages' => $fold->coordinating_editors()->toPages(),
                    'show_title' => false,
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Publisher',
              'folds' => $folds_as_publisher,
              'card_children' => function ($fold) {
                  return snippet('utilities/detail-list/pages', [
                    'title' => pluralize('Publisher', $fold->publishers()->toPages()->count()),
                    'pages' => $fold->publishers()->toPages(),
                    'show_title' => false,
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Archivist',
              'folds' => $folds_as_archivist,
              'card_children' => function ($fold) {
                  return snippet('utilities/detail-list/pages', [
                    'title' => pluralize('Archivist', $fold->archivists()->toPages()->count()),
                    'pages' => $fold->archivists()->toPages(),
                    'show_title' => false,
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Producer',
              'folds' => $folds_as_producer,
              'card_children' => function ($fold) {
                  return snippet('utilities/detail-list/pages', [
                    'title' => pluralize('Producer', $fold->producers()->toPages()->count()),
                    'pages' => $fold->producers()->toPages(),
                    'show_title' => false,
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Graphic Design Liaison',
              'folds' => $folds_as_graphic_design_liaison,
              'card_children' => function ($fold) {
                  return snippet('utilities/detail-list/pages', [
                    'title' => pluralize('Graphic Design Liason', $fold->graphic_design_liaisons()->toPages()->count()),
                    'pages' => $fold->graphic_design_liaisons()->toPages(),
                    'show_title' => false,
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Web Editor',
              'folds' => $folds_as_web_editor,
              'card_children' => function ($fold) {
                  return snippet('utilities/detail-list/pages', [
                    'title' => pluralize('Web Editor', $fold->web_editors()->toPages()->count()),
                    'pages' => $fold->web_editors()->toPages(),
                    'show_title' => false,
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
          </div>
        </div>
      </article>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
