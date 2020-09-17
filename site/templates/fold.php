<?php snippet('header') ?>
<div class="stack">
    <?php snippet('fold/cover', ['fold' => $page, 'menu' => collection('menu'), 'submenu' => collection('submenu'), 'home' => $site]) ?>
    <?php snippet('fold/details', ['fold' => $page]) ?>
    <?php snippet('fold/body', ['fold' => $page]) ?>
    <nav class="siblings">
      <?php if ($prev = $page->prev(collection('folds'))): ?>
      <a class="next" href="<?= $prev->url() ?>">
        ‹ <?= $prev->title() ?>
      </a>
      <?php endif ?>

      <?php if ($next = $page->next(collection('folds'))): ?>
      <a class="prev" href="<?= $next->url() ?>">
        <?= $next->title() ?> ›
      </a>
      <?php endif ?>
    </nav>
  </main>
</div>
<?php snippet('footer') ?>
