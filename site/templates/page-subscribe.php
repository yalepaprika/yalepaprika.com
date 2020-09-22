<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <?php snippet('page-subscribe/body', ['page' => $page]) ?>
  </main>
</div>
<?php snippet('footer') ?>
