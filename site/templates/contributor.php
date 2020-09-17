<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <article class="stack">
      <h1><?= $page->title()->widont() ?></h1>
      <div class="columns">
        <div class="column-left">
          <div class="stack">
            <?php snippet('utilities/detail-list/pages-y', ['title' => 'Articles', 'pages' => $articles]) ?>
          </div>
        </div>
      </div>
    </article>
  </main>
</div>
<?php snippet('footer') ?>
