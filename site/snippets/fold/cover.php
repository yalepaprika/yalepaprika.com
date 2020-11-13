<div
  class="fold-cover fold-cover-<?= $fold->slug() ?> <?= ($page->url() == $fold->url() ) ? 'fold-cover-fold-page' : '' ?> box-card box-card-inverted lazyload"
  data-bg="/assets/images/<?= $fold->slug() ?>-background-new.jpg"
  style="background-size: cover; background-position: left center;">
  <div class="fold-cover-main stack stack-space-between">
    <div class="fold-cover-top cluster cluster-switcher">
      <div class="_cluster">
        <div class="fold-cover-title stack stack-small">
          <a class="no-link-animation" href="<?= $fold->url() ?>"><h1><?= $fold->title() ?></h1></a>
          <h4>Volume <?= $fold->volume() ?> <span class="separator">·</span> Issue <?= sprintf('%02d', $fold->number()->value()) ?></h4>
        </div>
        <div class="fold-cover-info">
          <h4><?= $fold->formattedDate() ?></h4>
          <h4><?= $fold->children()->count() ?> article<?= $fold->children()->count() == 1 ? '' : 's' ?></h4>
        </div>
      </div>
    </div>
    <div class="fold-cover-bottom">
      <a class="fold-cover-read-more button button-primary" href="<?= $fold->url() ?>">Read More →</a>
    </div>
  </div>
</div>
