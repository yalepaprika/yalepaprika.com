<div class="fold-cover fold-cover-<?= $fold->slug() ?>">
  <div class="fold-cover-info">
    <div class="fold-cover-title-block stack">
      <a class="no-link-animation" href="<?= $fold->url() ?>"><h1><?= $fold->title()->widont() ?></h1></a>
      <h3><?= $fold->formattedNumber() ?></h3>
    </div>
    <div class="fold-cover-publication-info">
      <p><?= $fold->formattedDate() ?><p>
      <p class="fold-cover-publication-text">Paprika! is a window into emerging discourse from Yale School of Architecture and Yale School of Art.</p>
    </div>
  </div>
  <div class="fold-cover-details">
    <?php snippet('fold/article-list', ['articles' => $fold->children()]) ?>
  </div>
</div>
