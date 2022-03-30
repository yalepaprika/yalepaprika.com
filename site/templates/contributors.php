<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main class="rule rule--paprika">
      <?php snippet('page/title', ['title' => $page->title()]) ?>
      <?php foreach(collection('contributors/by-letter') as $letter => $contributors): ?>
        <?php snippet('contributors/list', ['title' => strtoupper($letter), 'contributors' => $contributors]) ?>
      <?php endforeach ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
