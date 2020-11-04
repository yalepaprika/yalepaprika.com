<?php snippet('header') ?>
<div class="stack">
  <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <article class="stack">
      <?php snippet('page/title', ['title' => $page->title()]) ?>
      <?php snippet('page/intro', ['page' => $page]) ?>
      <?php snippet('page/body', ['page' => $page]) ?>
      <?php snippet('page-about/details', ['about' => $page]) ?>
    </article>
  </main>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
