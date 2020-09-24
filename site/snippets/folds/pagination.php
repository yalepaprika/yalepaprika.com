<?php if ($folds->pagination()->hasPages()): ?>
  <nav class="pagination cluster">
    <div class="_cluster">
      <?php if ($folds->pagination()->hasNextPage()): ?>
        <a class="button" href="<?= $folds->pagination()->nextPageURL() ?>">
          ← Older Folds
        </a>
      <?php endif ?>
      <?php if ($folds->pagination()->hasPrevPage()): ?>
        <a class="button" href="<?= $folds->pagination()->prevPageURL() ?>">
          Newer Folds →
        </a>
      <?php endif ?>
    </div>
  </nav>
<?php endif ?>
