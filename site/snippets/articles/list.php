<?php if ($articles->isNotEmpty()): ?>
  <div class="articles-list space-after-80">
    <?php snippet('utilities/heading', [
      'title' => $title ?? 'Articles',
      'subtitle' => quantify('Article', $articles->count())
    ]) ?>
    <div class="space-after-20">
      <?php foreach ($articles as $article): ?>
        <?php snippet('article/list-item', [
          'article' => $article
        ]) ?>
      <?php endforeach ?>
    </div>
    <?php if (isset($children)): ?>
      <?= $children ?>
    <?php endif ?>
  </div>
<?php endif ?>
