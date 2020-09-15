<ol class="fold-article-list">
  <?php $i = 0; ?>
  <?php foreach ($articles as $article): ?>
    <li>
      <a class="no-link-animation" href="<?= $article->url() ?>">
        <div class="fold-article-list-number"><?= $i + 1?></div>
        <div class="fold-article-list-title-block">
          <h3><?= $article->title()->widont() ?></h3>
          <h4><?= $article->formattedContributors() ?></h4>
        </div>
        <div class="fold-article-list-arrow">→</div>
      </a>
    </li>
    <?php $i++; ?>
  <?php endforeach ?>
</ol>
