<div id="fold-viewer" class="fold-viewer font--inverted background-black space-after-20">
  <h2 class="sr-only">Fold Viewer</h2>
  <div class="fold-viewer__content space-inside-before-20">
    <div class="container-xxxl font-heading">
      <div class="row">
        <?php snippet('fold/header', [
          'fold' => $fold,
          'as' => 'div'
        ]) ?>
      </div>
    </div>
    <div class="fold-viewer__background container-xxxl">
      <canvas
        id="fold-viewer__canvas"
        class="fold-viewer__canvas"
        <?= Html::attr($fold->renderDataAttrs()) ?>
      ></canvas>
      <div id="fold-viewer__loading" class="fold-viewer__loading">
        <div class="w-100 h-100 font--secondary d-flex justify-content-center align-items-center">
          <div class="loading-bounce" style="animation-duration: 0.8s;">
            <div style="animation-delay: -0.3s;"></div>
            <div style="animation-delay: -0.2s;"></div>
            <div style="animation-delay: -0.1s;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-xxxl">
    <h3 class="sr-only">Fold Details</h3>
    <div class="fold-viewer__details row row-cols-2 row-cols-md-4">
      <?php snippet('fold/role', [
        'title' => 'Fold Editor',
        'pages' => $fold->fold_editors()->toPages()
      ]) ?>
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
