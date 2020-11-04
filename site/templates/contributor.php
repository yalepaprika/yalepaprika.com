<?php snippet('header') ?>
<div class="stack">
  <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <article class="stack">
      <?php snippet('page/title', ['title' => $page->title()]) ?>
      <div class="box-block box-block-ruled stack">
        <?php snippet('utilities/detail-list/pages-y', ['title' => 'Articles', 'pages' => $articles]) ?>
      </div>
    </article>
  </main>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
