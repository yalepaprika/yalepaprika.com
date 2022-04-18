<?php if ($articles->isNotEmpty()): ?>
  <div class="articles-cards space-after-80">
    <?php snippet('utilities/heading', [
      'title' => $title ?? 'Articles',
      'subtitle' => quantify('Article', $articles->count())
    ]) ?>
    <div class="container-xxxl">
      <div class="row row-cols-2 row-cols-md-4 align-items-stretch">
        <?php foreach ($articles as $article): ?>
          <?php snippet('article/card', [ 'article' => $article ]) ?>
        <?php endforeach ?>
      </div>
    </div>
    <?php if (isset($children)): ?>
      <?= $children ?>
    <?php endif ?>
  </div>
<?php endif ?>
