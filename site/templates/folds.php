<?php snippet('header') ?>
<div id="swup" class="container stack">
  <div class="page stack">
    <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main class="stack">
      <?php snippet('page/title', ['title' => $page->title()]) ?>
      <div class="box-block box-block-ruled stack">
        <?php snippet('folds/grid', ['folds' => $folds, 'page' => $page, 'layout' => $layout]) ?>
        <?php snippet('folds/pagination', ['folds' => $folds]) ?>
    </div>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
