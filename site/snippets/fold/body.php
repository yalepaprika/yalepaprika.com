<article class="fold-body stack">
  <h2 class="box-block">Editor's Statement</h2>
  <div class="fold-body-main box-block box-block-ruled cluster">
    <div class="_cluster">
      <div class="fold-body-details">
        <div class="stack">
            <?php snippet('utilities/detail-list/pages-y', ['title' => 'Editors', 'pages' => $fold->fold_editors()->toPages()]) ?>
        </div>
      </div>
      <div class="fold-body-content">
        <div class="content stack-recursive">
          <?= $fold->content()->get('content')->footnotes() ?>
        </div>
      </div>
    </div>
  </div>
</article>
