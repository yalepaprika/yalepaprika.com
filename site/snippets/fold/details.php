<div id="fold-details" class="fold-details box-card box-card-large-inset stack">
  <div class="fold-details-main cluster cluster-stack">
    <div class="_cluster">
      <?php snippet('utilities/detail-list/value-x', ['title' => 'Publication Date', 'value' => $fold->formattedDate()]) ?>
      <div class="fold-details-numbers cluster cluster-stack">
        <div class="_cluster">
          <?php snippet('utilities/detail-list/value-x', ['title' => 'Volume', 'value' => $fold->volume()]) ?>
          <?php snippet('utilities/detail-list/value-x', ['title' => 'Number', 'value' => sprintf('%02d', $fold->number()->value())]) ?>
        </div>
      </div>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Editors', 'pages' => $fold->fold_editors()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Graphic Designers', 'pages' => $fold->graphic_designers()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Coordinating Editors', 'pages' => $fold->coordinating_editors()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Publishers', 'pages' => $fold->publishers()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Archivists', 'pages' => $fold->archivists()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Producers', 'pages' => $fold->producers()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Web Editors', 'pages' => $fold->web_editors()->toPages()]) ?>
    </div>
  </div>
</div>
