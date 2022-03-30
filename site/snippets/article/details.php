<div id="article-details" class="article-details font-heading space-after-100 rule">
  <div class="container-xxxl">
    <?php snippet('utilities/detail-list/pages', [
      'title' => pluralize('Contributor', $article->contributors()->toPages()->count()),
      'pages' => $article->contributors()->toPages(),
      'show_title' => false,
      'inline' => 'true'
    ]) ?>
    <div class="font--secondary">
      <?php snippet('fold/header', ['fold' => $article->parent()]) ?>
    </div>
  </div>
</div>