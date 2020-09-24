<div class="page-body box-block box-block-ruled cluster cluster-ruled">
  <div class="_cluster">
    <div class="page-body-details">
      <?= $details ?? '' ?>
    </div>
    <div class="page-body-content">
      <div class="content stack stack-recursive">
        <?= $page->content()->get('content')->footnotes() ?>
      </div>
    </div>
  </div>
</div>
