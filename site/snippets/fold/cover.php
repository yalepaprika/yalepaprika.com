<div class="fold-cover fold-cover-<?= $fold->slug() ?> box-card box-card-inverted">
  <div class="fold-cover-info">
    <div class="fold-cover-title-block stack stack-small">
      <a class="no-link-animation" href="<?= $fold->url() ?>"><h1><?= $fold->title()->widont() ?></h1></a>
      <h3>Volume <?= $fold->volume() ?> <span class="separator">•</span> Issue <?= sprintf('%02d', $fold->number()->value()) ?></h3>
    </div>
    <div class="fold-cover-publication-info">
      <p><?= $fold->formattedDate() ?><p>
      <p class="fold-cover-publication-text"><em>Paprika!</em> is the often-weekly broadsheet published by the students of the Yale School of Architecture and Yale School of Art.</p>
    </div>
  </div>
  <div class="fold-cover-details">
    <?php snippet('fold/article-list', ['articles' => $fold->children()]) ?>
  </div>
</div>
