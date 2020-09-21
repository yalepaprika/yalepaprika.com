<article class="page-body stack">
  <?php snippet('page/title', ['page' => $page]) ?>
  <?php snippet('page/intro', ['page' => $page]) ?>
  <div class="page-body-main cluster">
    <div class="_cluster">
      <div class="page-body-details"></div>
      <div class="page-body-content">
        <div class="content stack-recursive">
          <?= $page->content()->get('content')->footnotes() ?>
        </div>
      </div>
    </div>
  </div>
</article>
