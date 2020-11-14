<div id="page-prev-next" class="page-prev-next box-block box-block-ruled cluster cluster-stack cluster-2-2-column cluster-switcher">
  <div class="_cluster">
    <div class="page-prev box-block-md-bottom-ruled">
      <?php if ($prev): ?>
        <h4>Previous</h4>
        <h2>
          <a class="page-prev-link" href="<?= $prev->url() ?>">
            <?= $prev->title() ?>
          </a>
        </h2>
      <?php endif ?>
    </div>
    <div class="page-next">
      <?php if ($next): ?>
        <h4>Next</h4>
        <h2>
          <a class="page-next-link" href="<?= $next->url() ?>">
            <?= $next->title() ?>
          </a>
        </h2>
      <?php endif ?>
    </div>
  </div>
</div>
