<?php if ($pages->isNotEmpty()): ?>
  <div class="page-role">
    <?php if( $inline ?? false ): ?>
      <?php snippet('utilities/detail-list/pages', [
        'title' => pluralize($title, $pages->count()),
        'pages' => $pages,
        'show_title' => false,
        'inline' => 'true'
      ]); ?>
    <?php else: ?>
      <div class="col rule space-after-40">
        <?php snippet('utilities/detail-list/pages', [
          'title' => pluralize($title, $pages->count()),
          'pages' => $pages
        ]) ?>
      </div>
    <?php endif ?>
  </div>
<?php endif ?>
