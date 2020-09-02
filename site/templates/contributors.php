<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <?php foreach($page->children() as $contributor): ?>
      <article>
        <a href="<?= $contributor->url() ?>"><h3><?= $contributor->title()->widont() ?></h3></a>
      </article>
    <?php endforeach ?>
  </main>
</div>
<?php snippet('footer') ?>
