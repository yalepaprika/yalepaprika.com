<?php snippet('header') ?>
<div id="swup" class="container stack">
  <div class="page stack">
    <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main class="stack">
      <article class="stack">
        <?php snippet('page/title', ['title' => $page->title()]) ?>
        <?php snippet('page/intro', ['page' => $page]) ?>
        <?php $details = snippet('article/body-details', ['article' => $page], true);
          snippet('page/body', ['page' => $page, 'details' => $details]) ?>
      </article>
      <?php snippet('fold/banner-embed', ['fold' => $page->parent()]) ?>
      <?php snippet('fold/details', ['fold' => $page->parent()]) ?>
      <?php snippet('page/prev-next', ['prev' => $page->prev(), 'next' => $page->next()]) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
