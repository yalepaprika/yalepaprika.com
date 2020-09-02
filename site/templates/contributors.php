<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <h1><?= $page->title() ?></h1>
    <?php foreach(collection('contributors') as $contributor): ?>
      <article>
        <a href="<?= $contributor->url() ?>"><h3><?= $contributor->title()->widont() ?></h3></a>
      </article>
    <?php endforeach ?>
  </main>
</div>
<?php snippet('footer') ?>
