<?php snippet('header') ?>
<div class="stack">
  <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <?php snippet('fold/cover', ['fold' => collection('folds')->first()]) ?>
    <?php snippet('banner-website/banner', []) ?>
    <?php snippet('banner-subscribe/banner', []) ?>
  </main>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
