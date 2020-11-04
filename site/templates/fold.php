<?php snippet('header') ?>
<div class="stack">
  <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <?php snippet('fold/cover', ['fold' => $page]) ?>
    <?php snippet('fold/table-of-contents', ['fold' => $page, 'articles' => $page->children()]) ?>
    <?php snippet('page/section-title', ['section_title' => 'Editor\'s Statement']) ?>
    <?php $details = snippet('fold/body-details', ['fold' => $page], true);
      snippet('page/body', ['page' => $page, 'details' => $details]) ?>
    <?php snippet('fold/viewer', ['fold' => $page]) ?>
    <?php snippet('articles/list', ['articles' => $page->children()]) ?>
    <?php snippet('fold/details', ['fold' => $page]) ?>
    <?php snippet('fold/download', ['fold' => $page]) ?>
    <?php snippet('page/prev-next', ['prev' => $page->prev(), 'next' => $page->next()]) ?>
  </main>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
