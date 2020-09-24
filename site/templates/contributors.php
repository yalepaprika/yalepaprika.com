<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <?php snippet('page/title', ['title' => $page->title()]) ?>
    <div class="box-block box-block-ruled stack">
    <?php foreach(collection('contributors') as $contributor): ?>
      <article>
        <a href="<?= $contributor->url() ?>"><h3><?= $contributor->title() ?></h3></a>
      </article>
    <?php endforeach ?>
    </div>
  </main>
</div>
<?php snippet('footer') ?>
