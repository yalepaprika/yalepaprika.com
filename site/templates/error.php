<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <article class="article-body stack">
      <?php snippet('page/title', ['title' => $page->title()]) ?>
    </article>
  </main>
</div>
<?php snippet('footer') ?>
