<?php snippet('header') ?>
<main class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <?php snippet('fold/cover', ['fold' => $page]) ?>
  <?php snippet('fold/details', ['fold' => $page]) ?>
  <?php snippet('fold/body', ['fold' => $page]) ?>
</main>
<?php snippet('footer') ?>
