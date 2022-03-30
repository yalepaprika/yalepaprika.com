<div id="fold-viewer-summary" class="fold-viewer-summary font--inverted background-black space-inside-before-20">
  <div class="container-xxxl">
    <div class="fold-viewer-summary__content row">
      <div class="col-6 col-md-3">
        <div class="rule space-after-40">
          <?php snippet('fold/header', ['fold' => $fold]) ?>
        </div>
      </div>
      <div class="col-6 col-md-3"></div>
      <div class="fold-viewer-summary__details col-12 col-md-6">
        <div class="row row-cols-2">
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
  </div>
</div>
