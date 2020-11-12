<div class="page-body box-block box-block-ruled cluster cluster-switcher cluster-ruled cluster-3-column">
  <div class="_cluster">
    <div class="page-body-details box-block-small">
      <?php if (isset($details)): ?>
        <?= $details ?? '' ?>
      <?php endif ?>
    </div>
    <div class="page-body-content">
      <div class="content stack stack-recursive">
        <?= $page->content()->get('content')->footnotes() ?>
      </div>
    </div>
  </div>
</div>
