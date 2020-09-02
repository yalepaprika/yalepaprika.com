<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <article class="stack">
      <h1><?= $page->title()->widont() ?></h1>
      <div class="columns">
        <div class="column-left">
          <div class="stack">
            <?php snippet('detail-list/pages', ['title' => 'Contributors', 'pages' => $page->contributors()->toPages()]) ?>
            <?php snippet('detail-list/value', ['title' => 'Date', 'value' => $page->parent()->publication_date()->toDate('F j, Y')]) ?>
            <?php snippet('detail-list/pages', ['title' => 'Fold', 'pages' => (new Pages())->add($page->parent())]) ?>
          </div>
        </div>
        <div class="column-content">
          <div class="content stack-recursive">
            <?= $page->content()->get('content')->footnotes() ?>
          </div>
        </div>
      </div>
    </article>
  </main>
</div>
<?php snippet('footer') ?>