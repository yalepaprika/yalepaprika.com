<?php if ($folds->pagination()->hasPages()): ?>
  <nav id="folds-pagination" class="cluster">
    <div class="_cluster">
      <?php if ($folds->pagination()->hasNextPage()): ?>
        <a class="button" id="folds-pagination-next" href="<?= $folds->pagination()->nextPageURL() ?>">
          ← Older Folds
        </a>
      <?php endif ?>
      <?php if ($folds->pagination()->hasPrevPage()): ?>
        <a class="button" id="folds-pagination-previous" href="<?= $folds->pagination()->prevPageURL() ?>">
          Newer Folds →
        </a>
      <?php endif ?>
    </div>
  </nav>
<?php endif ?>
