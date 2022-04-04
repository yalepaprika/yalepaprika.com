<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <article>
        <?php snippet('page/title', ['title' => $page->title()]) ?>
        <?php snippet('article/details', ['article' => $page]) ?>
        <?php snippet('page/body', ['page' => $page]) ?>
      </article>
      <?php snippet('fold/viewer-summary', ['fold' => $page->parent()]) ?>
      <?php snippet('page/prev-next', ['prev' => $page->prev(), 'next' => $page->next()]) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
