<article class="article-body cluster">
  <div class="_cluster">
    <div class="article-body-details">
      <div class="stack">
        <?php if (isset($contributors)): ?>
          <?php $contributors_title = $contributors_title ?? 'Contributors'; ?>
          <?php snippet('utilities/detail-list/pages-y', ['title' => 'Contributors', 'pages' => $contributors]) ?>
        <?php endif ?>
        <?php if (isset($fold)): ?>
          <?php snippet('utilities/detail-list/value-y', ['title' => 'Publication Date', 'value' => $page->formattedDate()]) ?>
        <?php endif ?>
      </div>
    </div>
    <div class="article-body-content">
      <div class="content stack-recursive">
        <?= $article->content()->get('content')->footnotes() ?>
      </div>
    </div>
  </div>
</article>
