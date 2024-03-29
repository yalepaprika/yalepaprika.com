<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <?php snippet('page/title', ['title' => $page->title()]) ?>
      <div id="pagination">
        <?php foreach($groups as $folds): ?>
          <?php $title = 'Volume ' . ($folds->first()->volume()->isEmpty() ? '??' : $folds->first()->volume()); ?>
          <div class="pagination-item">
            <?php snippet('folds/cards', ['title' => $title , 'folds' => $folds]) ?>
          </div>
          <?php endforeach ?>
      </div>
      <?php snippet('page/pagination', ['model' => 'Fold', 'pagination' => $pagination]) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
