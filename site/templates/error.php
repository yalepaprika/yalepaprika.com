<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <article class="article-body stack">
      <?php snippet('page/title', ['page' => $page]) ?>
    </article>
  </main>
</div>
<?php snippet('footer') ?>
