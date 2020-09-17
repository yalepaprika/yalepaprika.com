<?php snippet('header') ?>
<div class="stack">
  <?php snippet('fold/cover', ['fold' => collection('folds')->first(), 'menu' => collection('menu'), 'submenu' => collection('submenu'), 'home' => $site]) ?>
</div>
<?php snippet('footer') ?>
