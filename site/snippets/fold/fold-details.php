<div class="fold-details cluster">
  <?php snippet('utilities/detail-list/value', ['title' => 'Publication Date', 'value' => $fold->formattedDate()]) ?>
  <div>
    <?php snippet('utilities/detail-list/value', ['title' => 'Volume', 'value' => $fold->volume()]) ?>
    <?php snippet('utilities/detail-list/value', ['title' => 'Number', 'value' => $fold->number()]) ?>
  </div>
  <?php snippet('utilities/detail-list/pages', ['title' => 'Editors', 'pages' => $fold->fold_editors()->toPages()]) ?>
  <?php snippet('utilities/detail-list/pages', ['title' => 'Graphic Designers', 'pages' => $fold->graphic_designers()->toPages()]) ?>
  <?php snippet('utilities/detail-list/pages', ['title' => 'Coordinating Editors', 'pages' => $fold->coordinating_editors()->toPages()]) ?>
  <?php snippet('utilities/detail-list/pages', ['title' => 'Publishers', 'pages' => $fold->publishers()->toPages()]) ?>
  <?php snippet('utilities/detail-list/pages', ['title' => 'Web Editors', 'pages' => $fold->web_editors()->toPages()]) ?>
  <?php snippet('utilities/detail-list/pages', ['title' => 'Archivists', 'pages' => $fold->archivists()->toPages()]) ?>
</div>
