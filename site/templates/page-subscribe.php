<?php snippet('header') ?>
<div id="swup" class="container stack">
  <div class="page stack">
    <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <article class="stack">
        <?php snippet('page/title', ['title' => $page->title()]) ?>
        <?php snippet('page/intro', ['page' => $page]) ?>
        <?php snippet('page-subscribe/subscription-bundles', ['subscriptions' => $page->subscriptions()->toStructure()]) ?>
        <?php snippet('page/body', ['page' => $page]) ?>
      </article>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
