<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <h1><?= $page->title() ?></h1>
    <?php foreach($folds = collection('folds')->paginate(20) as $fold): ?>
      <article>
        <a href="<?= $fold->url() ?>"><h1><?= $fold->title()->widont() ?></h1></a>
      </article>
    <?php endforeach ?>
    <?php if ($folds->pagination()->hasPages()): ?>
      <nav class="pagination">

        <?php if ($folds->pagination()->hasNextPage()): ?>
        <a class="next" href="<?= $folds->pagination()->nextPageURL() ?>">
          ‹ Older Folds
        </a>
        <?php endif ?>

        <?php if ($folds->pagination()->hasPrevPage()): ?>
        <a class="prev" href="<?= $folds->pagination()->prevPageURL() ?>">
          Newer Folds ›
        </a>
        <?php endif ?>

      </nav>
    <?php endif ?>
  </main>
</div>
<?php snippet('footer') ?>
