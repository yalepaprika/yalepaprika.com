<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <?php snippet('page/title', ['title' => $page->title()->widont()]) ?>
    <?php snippet('page/intro', ['page' => $page]) ?>
    <?php $details = snippet('article/body-details', ['article' => $page], true);
      snippet('page/body', ['page' => $page, 'details' => $details]) ?>
    <?php snippet('fold/details', ['fold' => $page->parent()]) ?>
  </main>
</div>
<?php snippet('footer') ?>
