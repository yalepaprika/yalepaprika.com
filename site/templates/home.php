<?php snippet('header') ?>
<div id="swup" class="container stack">
  <div class="page stack">
    <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main class="stack">
      <?php snippet('fold/cover', ['fold' => collection('folds')->first()]) ?>
      <div class="cluster cluster-2-2-column cluster-stack cluster-stretch cluster-switcher">
        <div class="_cluster">
          <?php snippet('banner-website/banner', ['title' => '<em>Paprika?</em> Rolling', 'url' => 'https://www.paprika-rolling.com', 'description' => 'Visit our Summer 2020 sister platform.']) ?>
          <?php snippet('banner-subscribe/banner', []) ?>
        </div>
      </div>
      <!-- <?php snippet('home/folds-strip', ['folds' => collection('folds')->limit(10)]) ?> -->
      <?php snippet('articles/list', ['articles' => collection('folds')->first()->children(), 'header' => 'Recent Articles']) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
