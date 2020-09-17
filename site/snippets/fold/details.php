<div class="fold-details stack">
  <?php if (isset($context)): ?>
    <div class="fold-details-context">
      <a class="no-link-animation" href="<?= $fold->url() ?>"><h2><?= $fold->title()->widont() ?></h2></a>
    </div>
  <?php endif ?>
  <div class="fold-details-main cluster">
    <div class="_cluster">
      <?php snippet('utilities/detail-list/value-x', ['title' => 'Publication Date', 'value' => $fold->formattedDate()]) ?>
      <div class="fold-details-numbers cluster">
        <div class="_cluster">
          <?php snippet('utilities/detail-list/value-x', ['title' => 'Volume', 'value' => $fold->volume()]) ?>
          <?php snippet('utilities/detail-list/value-x', ['title' => 'Number', 'value' => sprintf('%02d', $fold->number()->value())]) ?>
        </div>
      </div>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Editors', 'pages' => $fold->fold_editors()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Graphic Designers', 'pages' => $fold->graphic_designers()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Coordinating Editors', 'pages' => $fold->coordinating_editors()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Publishers', 'pages' => $fold->publishers()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Web Editors', 'pages' => $fold->web_editors()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Archivists', 'pages' => $fold->archivists()->toPages()]) ?>
    </div>
  </div>
</div>
