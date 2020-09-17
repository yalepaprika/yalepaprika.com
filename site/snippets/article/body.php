<article class="article-body stack">
  <?php snippet('page/title', ['page' => $article]) ?>
  <div class="article-body-main cluster">
    <div class="_cluster">
      <div class="article-body-details">
        <div class="stack">
            <?php snippet('utilities/detail-list/pages-y', ['title' => 'Contributors', 'pages' => $article->contributors()->toPages()]) ?>
            <?php snippet('utilities/detail-list/value-y', ['title' => 'Publication Date', 'value' => $article->parent()->formattedDate()]) ?>
        </div>
      </div>
      <div class="article-body-content">
        <div class="content stack-recursive">
          <?= $article->content()->get('content')->footnotes() ?>
        </div>
      </div>
    </div>
  </div>
</article>
