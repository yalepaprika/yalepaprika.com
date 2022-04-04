<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('fold/cover', ['fold' => $page]) ?>
    <main>
      <div class="sr-only">
        <?php snippet('page/title', ['title' => $page->title()]) ?>
        <?php snippet('fold/subtitle', ['fold' => $page]) ?>
      </div>
      <?php snippet('fold/editors-statement') ?>
      <?php snippet('articles/list', ['articles' => $page->children()->notTemplate('embed')]) ?>
      <?php snippet('fold/viewer', ['fold' => $page]) ?>
      <?php snippet('page/prev-next', ['prev' => $page->next(collection('folds/list')), 'next' => $page->prev(collection('folds/list'))]) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
