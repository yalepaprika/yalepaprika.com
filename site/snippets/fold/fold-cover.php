<div class="fullscreen">
    <?php if (!isset($summary) || !$summary): ?>
      <?php snippet('menu', ['home' => $home, 'menu' => $menu, 'submenu' => $submenu]) ?>
    <?php endif ?>
    <div class="fullscreen-content">
      <div class="fold-cover">
        <div class="fold-cover-info">
          <div class="fold-cover-title-block stack">
            <h1><?= $fold->title()->widont() ?></h1>
            <h2><?= $fold->formattedNumber() ?></h2>
          </div>
          <div class="fold-cover-publication-date"><?= $fold->formattedDate() ?></div>
        </div>
        <div class="fold-cover-details">
          <?php snippet('fold/article-list', ['articles' => $fold->children()]) ?>
        </div>
      </div>
    </div>
  </div>
