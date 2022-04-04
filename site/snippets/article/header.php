<?php $element = $as ?? 'h3'; ?>
<<?= $element ?>>
  <a href="<?= $article->url() ?>" class="card-target">
    <?= removeorphans($article->title(), 5) ?>
  </a>
</<?= $element ?>>
<div class="font--secondary">
  <?php snippet('article/subtitle', ['article' => $article]) ?>
</div>
