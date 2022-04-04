<div class="article-subtitle">
  <?php if ($article->contributors()->toPages()->isNotEmpty()): ?>
    <ul class="article-list-item__contributors">
      <?php foreach ($article->contributors()->toPages() as $contributor): ?>
        <li class="d-inline"><a href="<?= $contributor->url() ?>"><?= $contributor->title() ?></a></li>
      <?php endforeach ?>
    </ul>
  <?php endif ?>
</div>