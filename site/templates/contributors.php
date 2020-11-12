<?php snippet('header') ?>
<div class="container stack">
  <div class="page stack">
    <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
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
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
