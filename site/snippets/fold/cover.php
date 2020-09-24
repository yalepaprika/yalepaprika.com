<div class="fold-cover fold-cover-<?= $fold->slug() ?> box-card box-card-inverted">
  <div class="fold-cover-main cluster">
    <div class="_cluster">
      <div class="fold-cover-info">
        <div class="fold-cover-title-block stack">
          <div class="stack stack-small">
            <a class="no-link-animation" href="<?= $fold->url() ?>"><h1><?= $fold->title() ?></h1></a>
            <h3>Volume <?= $fold->volume() ?> <span class="separator">•</span> Issue <?= sprintf('%02d', $fold->number()->value()) ?></h3>
          </div>
          <?php if ($summary = $fold->contributorsSummary()): ?>
            <p class="fold-cover-contributors-summary">Articles contributed by <?= $summary ?>, and others.</p>
          <?php endif ?>
          <div>
            <?php if ($page->url() != $fold->url() ): ?>
              <a class="button" href="<?= $fold->url() ?>">Read fold →</a>
            <?php endif ?>
          </div>
        </div>
      </div>
      <div class="fold-cover-details">
        <?php snippet('fold/article-list', ['articles' => $fold->children()]) ?>
      </div>
    </div>
  </div>
  <div class="fold-cover-publication-info">
    <p>Published <?= $fold->formattedDate() ?><p>
    <?php if ($page->isHomePage()): ?>
      <p class="fold-cover-publication-text"><em>Paprika!</em> is the often-weekly broadsheet published by the students of the Yale School of Architecture and Yale School of Art.</p>
    <?php endif ?>
  </div>
</div>
