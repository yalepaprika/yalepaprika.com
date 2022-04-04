<?php if ($pages->isNotEmpty()): ?>
  <div class="fold-role col space-after-40">
    <div class="overflow-hidden">
      <div class="rule">
        <?php snippet('utilities/detail-list/pages', [
          'title' => pluralize($title, $pages->count()),
          'pages' => $pages
        ]) ?>
      </div>
    </div>
  </div>
<?php endif ?>