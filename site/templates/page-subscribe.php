<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <article>
        <?php snippet('page/title', ['title' => $page->title()]) ?>
        <?php snippet('page-subscribe/subscription-viewer', ['subscriptions' => $page->subscriptions()->toStructure()]) ?>
        <?php snippet('page-subscribe/support-viewer', ['support' => $page->support()->toStructure()]) ?>
        <?php snippet('page/body', ['page' => $page]) ?>
      </article>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
