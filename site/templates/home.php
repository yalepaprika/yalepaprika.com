<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <?php snippet('fold/cover-summary', ['fold' => collection('folds/list')->first()]) ?>
      <?php snippet('articles/list', ['articles' => collection('articles/recent'), 'title' => 'Recent Articles']) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
