<div id="fold-cover-summary" class="fold-cover-summary container-xxxl card font--inverted background-paprika space-inside-after-20 space-inside-before-10 space-after-20">
  <div class="d-flex flex-column justify-content-between h-100">
    <h1 class="font-title" aria-hidden="true">
      <a href="<?= $fold->url() ?>" class="card-target"><?= $fold->title() ?></a>
    </h1>
    <div class="font-heading">
      <?php snippet('fold/subtitle', ['fold' => $fold]) ?>
    </div>
  </div>
</div>