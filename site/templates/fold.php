<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('fold/cover', ['fold' => $page]) ?>
    <main>
      <div class="sr-only">
        <?php snippet('page/title', ['title' => $page->title()]) ?>
        <?php snippet('fold/subtitle', ['fold' => $page]) ?>
        <?php if ($embed = $page->embedPage()): ?>
          <?php snippet('fold/link-block-embed', ['embed' => $embed]) ?>
        <?php endif; ?>
        <?php if ($pdf = $page->files()->template('fold-pdf')->first()): ?>
          <?php snippet('fold/link-block-pdf', ['pdf' => $pdf]) ?>
        <?php endif ?>
      </div>
      <?php snippet('fold/editors-statement', ['fold' => $page]) ?>
      <?php snippet('articles/list', ['articles' => $page->children()->notTemplate('embed')]) ?>
      <?php snippet('fold/viewer', ['fold' => $page]) ?>
      <?php snippet('page/prev-next', ['model' => 'Fold', 'prev' => $page->next(collection('folds/list')), 'next' => $page->prev(collection('folds/list'))]) ?>
      <?php snippet('fold/more', ['fold' => $page]) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
