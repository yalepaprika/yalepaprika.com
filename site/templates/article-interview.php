<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <?php snippet('article/body', ['article' => $page]) ?>
    <?php snippet('fold/details', ['fold' => $page->parent(), 'context' => True]) ?>
  </main>
</div>
<?php snippet('footer') ?>
