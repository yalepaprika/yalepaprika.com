<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <?php snippet('fold/cover-summary', ['fold' => collection('folds/list')->first()]) ?>
      <?php snippet('folds/recent', ['folds' => collection('folds/recent'), 'parent' => $site->find('folds')]) ?>
      <?php snippet('articles/recent', ['articles' => collection('articles/recent'), 'parent' => $site->find('articles')]) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
