<div
  id="fold-cover-summary"
  class="fold-cover-summary container-xxxl card font--inverted background-paprika space-inside-after-20 space-after-20 <?= $fold->slug() === "rendering-fiction" ||  $fold->slug() === "transient-nostalgia" ? "fold-cover-summary--has-background" : "" ?>"
  style="--background-url: url('<?= (new Asset('assets/images/' . $fold->slug() . '-background-new.jpg'))->url() ?>');"
>
  <div class="d-flex flex-column justify-content-between h-100">
    <h1 class="font-title" aria-hidden="true">
      <a href="<?= $fold->url() ?>" class="card-target"><?= $fold->title() ?></a>
    </h1>
    <div class="font-heading">
      <div class="d-flex">
        <div class="fold-cover-summary__block">
          <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1em" height="1em">
            <circle fill="currentColor" fill-rule="nonzero" cx="9" cy="15" r="9"></rect>
          </svg>
        </div>
        <div>
          <?php snippet('fold/subtitle', ['fold' => $fold]) ?>
        </div>
      </div>
    </div>
  </div>
</div>
