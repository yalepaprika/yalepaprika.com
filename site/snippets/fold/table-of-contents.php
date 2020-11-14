<?php
  $article_columns = [[], []];
  $i = 0;
  $article_count = $articles->count();
  foreach ($articles as $article) {
    if ($i <= $article_count / 2) {
      $article_columns[0][] = $article;
    } else {
      $article_columns[1][] = $article;
    }
    $i++;
  }
?>
<div id="fold-toc" class="fold-toc box-block cluster cluster-stack cluster-1-1-1-1-column cluster-switcher">
  <div class="_cluster">
    <div class="fold-toc-title box-block box-block-md-bottom-ruled">
      <h2>Table of Contents</h2>
    </div>
    <div class="fold-toc-sections">
      <ul>
        <li>
          <h5>
            <a href="#page-section-title">Editor's Statement</a>
          </h5>
        </li>
        <li>
          <h5>
            <a href="#fold-viewer">Fold Viewer</a>
          </h5>
        </li>
        <li>
          <h5>
            <a href="#articles-list">Articles</a>
          </h5>
        </li>
        <li>
          <h5>
            <a href="#fold-details">Information</a>
          </h5>
        </li>
      </ul>
    </div>
    <?php $j = 0; ?>
    <?php foreach ($article_columns as $article_column): ?>
      <div class="fold-toc-articles">
        <ol class="stack stack-small">
          <?php foreach ($article_column as $article): ?>
            <li class="fold-toc-article-item">
              <div class="fold-toc-number"><?= $j + 1?></div>
              <div class="fold-toc-article-title">
                <h5>
                  <a href="<?= $article->url() ?>">
                    <?= $article->title()->widont() ?>
                  </a>
                </h5>
                <h5>
                  <?php $k = 0; ?>
                  <?php $count = $article->contributors()->toPages()->count(); ?>
                  <?php foreach ($article->contributors()->toPages() as $contributor): ?>
                    <a href="<?= $contributor->url() ?>" class="no-link-animation"><?= $contributor->title() ?></a><?= ($k !== $count - 1) ? ', ' : '' ?>
                    <?php $k++; ?>
                  <?php endforeach ?>
                </h5>
              </div>
            </li>
            <?php $j++; ?>
          <?php endforeach ?>
        </ol>
      </div>
    <?php endforeach ?>
  </div>
</div>
