<div class="home-folds-strip">
  <div class="home-folds-strip-scrollable" data-simplebar>
    <div class="home-folds-strip-folds">
      <?php foreach ($folds->flip() as $fold): ?>
        <div class="home-folds-strip-fold-wrapper">
          <div class="home-folds-strip-fold stack stack-space-between ">
            <div class="box-block-small stack stack-small">
              <h6>Volume <?= $fold->volume() ?> <span class="separator">·</span> Issue <?= sprintf('%02d', $fold->number()->value()) ?></h6>
              <h5><?= $fold->title() ?></h5>
            </div>
            <a class="no-link-animation" href="<?= $fold->url() ?>">
              <div class="home-folds-strip-image">
              </div>
            </a>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
