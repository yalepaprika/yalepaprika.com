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
                  return snippet('page/role', [
                    'title' => 'Fold Editor',
                    'pages' => $fold->fold_editors()->toPages(),
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Graphic Designer',
              'folds' => $folds_as_graphic_designer,
              'card_children' => function ($fold) {
                  return snippet('page/role', [
                    'title' => 'Graphic Designer',
                    'pages' => $fold->graphic_designers()->toPages(),
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Coordinating Editor',
              'folds' => $folds_as_coordinating_editor,
              'card_children' => function ($fold) {
                  return snippet('page/role', [
                    'title' => 'Coordinating Editors',
                    'pages' => $fold->coordinating_editors()->toPages(),
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Publisher',
              'folds' => $folds_as_publisher,
              'card_children' => function ($fold) {
                  return snippet('page/role', [
                    'title' => 'Publisher',
                    'pages' => $fold->publishers()->toPages(),
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Archivist',
              'folds' => $folds_as_archivist,
              'card_children' => function ($fold) {
                  return snippet('page/role', [
                    'title' => 'Archivist',
                    'pages' => $fold->archivists()->toPages(),
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Producer',
              'folds' => $folds_as_producer,
              'card_children' => function ($fold) {
                  return snippet('page/role', [
                    'title' => 'Producer',
                    'pages' => $fold->producers()->toPages(),
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Graphic Design Liaison',
              'folds' => $folds_as_graphic_design_liaison,
              'card_children' => function ($fold) {
                  return snippet('page/role', [
                    'title' => 'Graphic Design Liason',
                    'pages' => $fold->graphic_design_liaisons()->toPages(),
                    'inline' => 'true'
                  ], true);
                }
              ]) ?>
            <?php snippet('folds/cards', [
              'title' => 'Web Editor',
              'folds' => $folds_as_web_editor,
              'card_children' => function ($fold) {
                  return snippet('page/role', [
                    'title' => 'Web Editor',
                    'pages' => $fold->web_editors()->toPages(),
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
