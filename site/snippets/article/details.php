<div id="article-details" class="article-details font-heading space-after-100 rule">
  <div class="container-xxxl">
    <?php snippet('page/role', [
      'title' => 'Contributor',
      'pages' => $article->contributors()->toPages(),
      'inline' => 'true'
    ]) ?>
    <div class="font--secondary">
      <?php snippet('fold/header', ['fold' => $article->parent()]) ?>
    </div>
  </div>
</div>
