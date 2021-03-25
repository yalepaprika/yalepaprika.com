<?php snippet('header') ?>
<div id="swup" class="container stack">
  <div class="page stack">
    <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main class="stack">
      <?php snippet('fold/cover', ['fold' => collection('folds')->first()]) ?>
      <?php snippet('home/banners', ['banners' => collection('banners')]) ?>
      <!-- <?php snippet('home/folds-strip', ['folds' => collection('folds')->limit(10)]) ?> -->
      <?php snippet('articles/list', ['articles' => collection('folds')->first()->children(), 'header' => 'Recent Articles']) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
