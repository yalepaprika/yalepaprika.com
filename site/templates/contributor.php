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
            <?php snippet('folds/cards', ['title' => 'Fold Editor', 'folds' => $folds_as_fold_editor]) ?>
            <?php snippet('folds/cards', ['title' => 'Graphic Designer', 'folds' => $folds_as_graphic_designer]) ?>
            <?php snippet('folds/cards', ['title' => 'Coordinating Editor', 'folds' => $folds_as_coordinating_editor]) ?>
            <?php snippet('folds/cards', ['title' => 'Publisher', 'folds' => $folds_as_publisher]) ?>
            <?php snippet('folds/cards', ['title' => 'Archivist', 'folds' => $folds_as_archivist]) ?>
            <?php snippet('folds/cards', ['title' => 'Producer', 'folds' => $folds_as_producer]) ?>
            <?php snippet('folds/cards', ['title' => 'Graphic Design Liaison', 'folds' => $folds_as_graphic_design_liaison]) ?>
            <?php snippet('folds/cards', ['title' => 'Web Editor', 'folds' => $folds_as_web_editor]) ?>
          </div>
        </div>
      </article>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
