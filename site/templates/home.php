<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <?php snippet('fold/cover', ['fold' => collection('folds')->first()]) ?>
  <?php snippet('banner-website/banner', []) ?>
  <?php snippet('banner-subscribe/banner', []) ?>
</div>
<?php snippet('footer') ?>
