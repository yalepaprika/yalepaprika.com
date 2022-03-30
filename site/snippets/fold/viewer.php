<div id="fold-viewer" class="fold-viewer font--inverted background-black space-inside-before-20">
  <div class="fold-viewer__content">
    <?php $children = snippet('fold/header', [
      'fold' => $fold,
      'as' => 'h2'
    ], true) ?>
    <?php snippet('utilities/heading', [
      'children' => $children,
    ]) ?>
  </div>
  <div class="container-xxxl">
    <div class="fold-viewer__details row row-cols-2 row-cols-md-4">
      <?php snippet('fold/role', [
        'title' => 'Graphic Designer',
        'pages' => $fold->graphic_designers()->toPages()
      ]) ?>
      <?php snippet('fold/role', [
        'title' => 'Coordinating Editor',
        'pages' => $fold->coordinating_editors()->toPages()
      ]) ?>
      <?php snippet('fold/role', [
        'title' => 'Publisher',
        'pages' => $fold->publishers()->toPages()
      ]) ?>
      <?php snippet('fold/role', [
        'title' => 'Archivist',
        'pages' => $fold->archivists()->toPages()
      ]) ?>
      <?php snippet('fold/role', [
        'title' => 'Producer',
        'pages' => $fold->producers()->toPages()
      ]) ?>
      <?php snippet('fold/role', [
        'title' => 'Web Editor',
        'pages' => $fold->web_editors()->toPages()
      ]) ?>
    </div>
  </div>
</div>
