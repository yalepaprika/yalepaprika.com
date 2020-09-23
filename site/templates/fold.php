<?php snippet('header') ?>
<main class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <?php snippet('fold/cover', ['fold' => $page]) ?>
  <?php snippet('fold/details', ['fold' => $page]) ?>
  <?php snippet('page/section-title', ['sectionTitle' => 'Editor\'s Statement']) ?>
  <?php $details = snippet('fold/body-details', ['fold' => $page], true);
    snippet('page/body', ['page' => $page, 'details' => $details]) ?>
</main>
<?php snippet('footer') ?>
