<article class="article-body stack">
  <?php snippet('page/title', ['page' => $page]) ?>
  <div class="article-body-main cluster">
    <div class="_cluster">
      <div class="article-body-details"></div>
      <div class="article-body-content">
        <div class="content stack-recursive">
          <?= $page->content()->get('content')->footnotes() ?>
        </div>
      </div>
    </div>
  </div>
</article>
