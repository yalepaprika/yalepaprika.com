<div class="articles-list box-block box-block-ruled cluster cluster-stack cluster-1-3-column cluster-switcher">
  <div class="_cluster">
    <div class="articles-list-title box-block box-block-md-bottom-ruled">
      <?php if (isset($header)): ?>
        <h2><?= $header ?? 'Articles' ?></h2>
      <?php else: ?>
        <h2>Articles</h2>
      <?php endif ?>
    </div>
    <div class="articles-list-articles">
      <ol class="stack stack-ruled">
        <?php $i = 0; ?>
        <?php foreach ($articles as $article): ?>
          <li class="articles-list-article-item box-block-small">
            <div class="articles-list-number"><?= $i + 1?></div>
            <div class="articles-list-article-info stack stack-small">
              <h3>
                <a href="<?= $article->url() ?>">
                  <?= $article->title()->widont() ?>
                </a>
              </h3>
              <div class="cluster cluster-2-2-column cluster-stack cluster-switcher">
                <div class="_cluster">
                  <h4><?= $article->formattedContributors() ?></h4>
                  <div class="articles-list-article-details">
                    <?= $article->content()->get('content')->words() ?> words • <?= $article->templateName() ?>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <?php $i++; ?>
        <?php endforeach ?>
      </ol>
    </div>
  </div>
</div>
