<div class="stack">
  <?php snippet('utilities/detail-list/pages-y', ['title' => 'Contributors', 'pages' => $article->contributors()->toPages()]) ?>
  <?php snippet('utilities/detail-list/value-y', ['title' => 'Publication Date', 'value' => $article->parent()->formattedDate()]) ?>
</div>
