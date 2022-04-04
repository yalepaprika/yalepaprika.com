<div id="fold-viewer-summary" class="fold-viewer-summary font--inverted background-black space-inside-before-20 space-after-20">
  <h2 class="sr-only">Fold Viewer</h2>
  <div class="container-xxxl">
    <div class="row">
      <div class="fold-viewer-summary__content col-12 col-md-6">
        <div class="space-after-40">
          <?php snippet('fold/header', ['fold' => $fold, 'as' => 'div']) ?>
        </div>
        <div class="fold-viewer-summary__background">
          <canvas
            id="fold-viewer-summary__canvas"
            class="fold-viewer-summary__canvas"
            <?= Html::attr($fold->renderDataAttrs()) ?>
          ></canvas>
          <div id="fold-viewer-summary__loading" class="fold-viewer-summary__loading">
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
