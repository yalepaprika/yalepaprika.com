<?php $element = $as ?? 'h3'; ?>
<<?= $element ?>>
  <a href="<?= $article->url() ?>" class="card-target">
    <?= removeorphans($article->title(), 5) ?>
  </a>
</<?= $element ?>>
<?php if ($article->contributors()->toPages()->isNotEmpty()): ?>
  <ul class="article-list-item__contributors font--secondary">
    <?php foreach ($article->contributors()->toPages() as $contributor): ?>
      <li class="d-inline"><a href="<?= $contributor->url() ?>"><?= $contributor->title() ?></a></li>
    <?php endforeach ?>
  </ul>
<?php endif ?>