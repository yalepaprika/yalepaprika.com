<?php snippet('header') ?>
<div class="container stack">
  <div class="page stack">
    <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <article class="stack">
        <?php snippet('page/title', ['title' => $page->title()]) ?>
        <div class="box-block box-block-ruled stack">
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Articles', 'pages' => $articles]) ?>
        </div>
      </article>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
