<div id="page-prev-next" class="page-prev-next box-block box-block-ruled cluster cluster-stack cluster-2-2-column cluster-switcher">
  <div class="_cluster">
    <div class="page-prev box-block-md-bottom-ruled">
      <?php if ($prev): ?>
        <div class="stack stack-small">
          <div>
            <h4>Previous</h4>
            <h2>
              <a class="page-prev-link" href="<?= $prev->url() ?>">
                <?= $prev->title() ?>
              </a>
            </h2>
          </div>
          <?php if ($prev->template() == 'fold'): ?>
            <div>
              <h6>Volume <?= $prev->volume() ?> <span class="separator">·</span> Issue <?= sprintf('%02d', $prev->number()->value()) ?></h6>
              <h6><?= $prev->formattedDate() ?></h6>
            </div>
          <?php endif ?>
          <?php if ($prev->template() == 'article' || $prev->template() == 'article-interview' || $prev->template() == 'article-on-the-ground'): ?>
            <div>
              <h6><?= $prev->formattedContributors() ?></h6>
              <h6><?= $prev->templateName() ?></h6>
              <h6><?= $prev->content()->get('content')->words() ?> words</h6>
            </div>
          <?php endif ?>
        </div>
      <?php endif ?>
    </div>
    <div class="page-next">
      <?php if ($next): ?>
        <div class="stack stack-small">
          <div>
            <h4>Next</h4>
            <h2>
              <a class="page-next-link" href="<?= $next->url() ?>">
                <?= $next->title() ?>
              </a>
            </h2>
          </div>
          <?php if ($next->template() == 'fold'): ?>
            <div>
              <h6>Volume <?= $next->volume() ?> <span class="separator">·</span> Issue <?= sprintf('%02d', $next->number()->value()) ?></h6>
              <h6><?= $next->formattedDate() ?></h6>
            </div>
          <?php endif ?>
          <?php if ($next->template() == 'article' || $next->template() == 'article-interview' || $next->template() == 'article-on-the-ground'): ?>
            <div>
              <h6><?= $next->formattedContributors() ?></h6>
              <h6><?= $next->templateName() ?></h6>
              <h6><?= $next->content()->get('content')->words() ?> words</h6>
            </div>
          <?php endif ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>
