<?php snippet('header') ?>
<div id="swup" class="container stack">
  <div class="page stack">
    <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <article class="stack">
        <?php snippet('page/title', ['title' => $page->title()]) ?>
        <div class="box-block box-block-ruled stack">
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Articles', 'pages' => $articles]) ?>
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Folds (Fold Editor)', 'pages' => $folds_as_fold_editor]) ?>
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Folds (Graphic Designer)', 'pages' => $folds_as_graphic_designer]) ?>
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Folds (Coordinating Editor)', 'pages' => $folds_as_coordinating_editor]) ?>
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Folds (Publisher)', 'pages' => $folds_as_publisher]) ?>
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Folds (Archivist)', 'pages' => $folds_as_archivist]) ?>
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Folds (Producer)', 'pages' => $folds_as_producer]) ?>
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Folds (Graphic Design Liaison)', 'pages' => $folds_as_graphic_design_liaison]) ?>
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Folds (Web Editor)', 'pages' => $folds_as_web_editor]) ?>
        </div>
      </article>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
