<div id="articles-list" class="articles-list box-block box-block-ruled cluster cluster-stack cluster-1-3-column cluster-switcher">
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
          <li class="articles-list-article-item box-link box-block-small">
            <div class="articles-list-article-number"><?= $i + 1?></div>
            <div class="article-list-article-info cluster cluster-switcher cluster-stack cluster-small">
              <div class="_cluster">
                <div class="articles-list-article-title stack stack-small">
                  <h3>
                    <a href="<?= $article->url() ?>" class="box-link-target-link">
                      <?= $article->title()->widont() ?>
                    </a>
                  </h3>
                  <h4>
                    <?php $j = 0; ?>
                    <?php $count = $article->contributors()->toPages()->count(); ?>
                    <?php foreach ($article->contributors()->toPages() as $contributor): ?>
                      <a href="<?= $contributor->url() ?>" class="box-link-secondary-link no-link-animation"><?= $contributor->title() ?></a><?= ($j !== $count - 1) ? ', ' : '' ?>
                      <?php $j++; ?>
                    <?php endforeach ?>
                  </h4>
                </div>
                <div class="articles-list-article-details">
                  <div><?= $article->templateName() ?></div>
                  <div><?= $article->content()->get('content')->words() ?> words</div>
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
