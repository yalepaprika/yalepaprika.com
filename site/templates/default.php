<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <article class="stack">
      <h1><?= $page->title() ?></h1>
      <div class="content stack-recursive">
        <?= $page->content()->get('content')->footnotes() ?>
      </div>
    </article>
  </main>
</div>
<?php snippet('footer') ?>
