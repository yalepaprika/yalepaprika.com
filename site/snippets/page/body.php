<div class="page-body box-block box-block-ruled cluster cluster-switcher cluster-ruled cluster-3-column">
  <div class="_cluster">
    <?php if ($detailsIsSet = isset($details)): ?>
      <div class="page-body-details">
        <?= $details ?? '' ?>
      </div>
    <?php endif ?>
    <div class="page-body-content <?= !$detailsIsSet ? 'page-body-content-spacer' : '' ?>">
      <div class="content stack stack-recursive">
        <?= $page->content()->get('content')->footnotes() ?>
      </div>
    </div>
  </div>
</div>
