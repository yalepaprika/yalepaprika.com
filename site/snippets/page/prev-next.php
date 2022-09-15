<div id="page-prev-next" class="page-prev-next container-xxxl space-after-20">
  <h2 class="sr-only">Next & Previous <?= pluralize($model, 2) ?></h2>
  <div class="row align-items-stretch">
    <?php if ($prev): ?>
      <div class="page-prev-next__prev col col-sm-3">
        <div class="rule card card--highlight space-inside-after-40 h-100">
          <div>
            <h3 class="font--secondary">Previous</h3>
            <div>
              <a href="<?= $prev->url() ?>" class="card-target">
                <?= removeorphans($prev->title(), 5) ?>
              </a>
            </div>
          </div>
          <div class="font--secondary">
            <?php if ($prev->template() == 'fold'): ?>
              <?php snippet('fold/subtitle', ['fold' => $prev]) ?>
            <?php endif ?>
            <?php if ($prev->template() == 'article' || $prev->template() == 'article-interview' || $prev->template() == 'article-on-the-ground'): ?>
              <?php snippet('article/subtitle', ['article' => $prev]) ?>
            <?php endif ?>
          </div>
        </div>
      </div>
    <?php endif ?>
    <?php if ($next): ?>
      <div class="page-prev-next__next col">
        <div class="rule card card--highlight space-inside-after-40 h-100">
          <div>
            <h3 class="font--secondary">Next</h3>
            <div>
              <a href="<?= $next->url() ?>" class="card-target">
                <?= removeorphans($next->title(), 5) ?>
              </a>
            </div>
          </div>
          <div class="font--secondary">
            <?php if ($next->template() == 'fold'): ?>
              <?php snippet('fold/subtitle', ['fold' => $next]) ?>
            <?php endif ?>
            <?php if ($next->template() == 'article' || $next->template() == 'article-interview' || $next->template() == 'article-on-the-ground'): ?>
              <?php snippet('article/subtitle', ['article' => $next]) ?>
            <?php endif ?>
          </div>
        </div>
      </div>
    <?php endif ?>
  </div>
</div>
