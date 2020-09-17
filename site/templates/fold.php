<?php snippet('header') ?>
<div class="stack">
    <?php snippet('fold/cover', ['fold' => $page, 'menu' => collection('menu'), 'submenu' => collection('submenu'), 'home' => $site]) ?>
    <?php snippet('fold/details', ['fold' => $page]) ?>
    <article class="stack">
      <h1><?= $page->title()->widont() ?></h1>
      <div class="columns">
        <div class="column-left">
          <div class="stack">
            <?php snippet('utilities/detail-list/pages-y', ['title' => 'Editors', 'pages' => $page->fold_editors()->toPages()]) ?>
            <?php snippet('utilities/detail-list/value-y', ['title' => 'Date', 'value' => $page->formattedDate()]) ?>
            <?php snippet('utilities/detail-list/pages-y', ['title' => 'Articles', 'pages' => $page->children()]) ?>
          </div>
        </div>
        <div class="column-content">
          <div class="content stack-recursive">
            <?= $page->content()->get('content')->footnotes() ?>
          </div>
        </div>
        <div class="column-right">
          <div class="stack">
            <?php snippet('utilities/detail-list/pages-y', ['title' => 'Graphic Designers', 'pages' => $page->graphic_designers()->toPages()]) ?>
            <?php snippet('utilities/detail-list/pages-y', ['title' => 'Contributing Editors', 'pages' => $page->contributing_editors()->toPages()]) ?>
            <?php snippet('utilities/detail-list/pages-y', ['title' => 'Web Editors', 'pages' => $page->web_editors()->toPages()]) ?>
            <?php snippet('utilities/detail-list/pages-y', ['title' => 'Publishers', 'pages' => $page->publishers()->toPages()]) ?>
          </div>
        </div>
      </div>
    </article>
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
