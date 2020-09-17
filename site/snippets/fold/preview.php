<div class="fold-preview">
  <div class="fold-preview-placeholders cluster">
    <div class="_cluster">
      <?php if ($prev = $fold->prev(collection('folds'))): ?>
        <div class="fold-preview-prev">
          <a class="no-link-animation" href="<?= $prev->url() ?>">
            <div class="fold-preview-translate stack">
              <div class="fold-preview-image">
                <?php if($image = $prev->files()->template('fold-back')->first()): ?>
                  <img srcset="<?= $image->srcset([400, 800]) ?>" alt="">
                <?php endif ?>
              </div>
              <div class="fold-preview-caption">←	Previous</div>
            </div>
          </a>
        </div>
      <?php endif ?>
      <div class="fold-preview-current-placeholder"></div>
      <?php if ($next = $fold->next(collection('folds'))): ?>
        <div class="fold-preview-next">
          <a class="no-link-animation" href="<?= $next->url() ?>">
            <div class="fold-preview-translate stack">
              <div class="fold-preview-image">
                <?php if($image = $next->files()->template('fold-front')->first()): ?>
                  <img srcset="<?= $image->srcset([400, 800]) ?>" alt="">
                <?php endif ?>
              </div>
              <div class="fold-preview-caption">Next →</div>
            </div>
          </a>
        </div>
      <?php endif ?>
    </div>
  </div>
  <div class="fold-preview-overlay cluster">
    <div class="fold-preview-current _cluster">
      <div class="fold-preview-current-front stack">
        <div class="fold-preview-image">
          <?php if($image = $fold->files()->template('fold-front')->first()): ?>
            <img srcset="<?= $image->srcset([400, 800]) ?>" alt="">
          <?php endif ?>
        </div>
        <div class="fold-preview-caption">Front</div>
      </div>
      <div class="fold-preview-current-back stack">
        <div class="fold-preview-image">
          <?php if($image = $fold->files()->template('fold-back')->first()): ?>
            <img srcset="<?= $image->srcset([400, 800]) ?>" alt="">
          <?php endif ?>
        </div>
        <div class="fold-preview-caption">Back</div>
      </div>
    </div>
  </div>
</div>
