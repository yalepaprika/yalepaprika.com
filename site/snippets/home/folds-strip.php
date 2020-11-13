<div class="home-folds-strip">
  <div class="home-folds-strip-scrollable" data-simplebar>
    <div class="home-folds-strip-folds">
      <?php foreach ($folds->flip() as $fold): ?>
        <div class="home-folds-strip-fold-wrapper">
          <div class="home-folds-strip-fold stack stack-small">
            <h6>Volume <?= $fold->volume() ?> Issue <?= sprintf('%02d', $fold->number()->value()) ?></h6>
            <h5 class="box-block-small"><?= $fold->title() ?></h5>
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
