<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <article class="stack">
      <?php snippet('page/title', ['title' => $page->title()->widont()]) ?>
      <div class="box-block box-block-ruled stack">
        <?php snippet('utilities/detail-list/pages-y', ['title' => 'Articles', 'pages' => $articles]) ?>
      </div>
    </article>
  </main>
</div>
<?php snippet('footer') ?>
