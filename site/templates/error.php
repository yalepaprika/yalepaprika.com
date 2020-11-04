<?php snippet('header') ?>
<div class="stack">
  <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <article class="article-body stack">
      <?php snippet('page/title', ['title' => $page->title()]) ?>
    </article>
  </main>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
