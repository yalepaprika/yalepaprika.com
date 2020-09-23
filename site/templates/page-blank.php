<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <article class="stack">
      <?php snippet('page/title', ['title' => $page->title()->widont()]) ?>
      <?php snippet('page/intro', ['page' => $page]) ?>
      <?php snippet('page/body', ['page' => $page]) ?>
    </article>
  </main>
</div>
<?php snippet('footer') ?>
