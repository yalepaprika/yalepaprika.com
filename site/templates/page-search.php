<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <article>
        <?php snippet('page/title', ['title' => $page->title()]) ?>
        <?php snippet('page/body', ['page' => $page]) ?>
      </article>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
