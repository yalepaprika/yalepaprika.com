<?php snippet('header') ?>
<div class="container stack">
  <div class="page stack">
    <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main class="stack">
      <?php snippet('fold/cover', ['fold' => $page]) ?>
      <?php snippet('fold/table-of-contents', ['fold' => $page, 'articles' => $page->children()]) ?>
      <?php snippet('fold/editors-statement') ?>
      <?php $details = snippet('fold/body-details', ['fold' => $page], true);
        snippet('page/body', ['page' => $page, 'details' => $details]) ?>
      <!-- <?php snippet('fold/viewer', ['fold' => $page]) ?> -->
      <?php snippet('articles/list', ['articles' => $page->children()]) ?>
      <?php snippet('fold/details', ['fold' => $page]) ?>
      <?php snippet('fold/download', ['fold' => $page]) ?>
      <?php snippet('page/prev-next', ['prev' => $page->next(collection('folds')), 'next' => $page->prev(collection('folds'))]) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
