<div
  id="fold-cover"
  class="fold-cover space-after-20 <?= $fold->slug() === "rendering-fiction" ||  $fold->slug() === "transient-nostalgia" || $fold->slug() === "transient-intimacy" ? "fold-cover--has-background" : "" ?>"
  style="--background-url: url('<?= (new Asset('assets/images/' . $fold->slug() . '-background-new.jpg'))->url() ?>');"
>
  <div class="fold-cover__container font--inverted background-paprika space-inside-after-20 d-flex flex-column">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <div class="fold-cover__content d-flex flex-column justify-content-between container-xxxl flex-grow-1" aria-hidden="true">
      <h1 class="font-title">
        <?= $fold->title() ?>
      </h1>
      <div class="font-heading">
        <div class="d-flex">
          <div class="fold-cover__block">
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
  <div aria-hidden="true">
    <?php if ($embed = $page->embedPage()): ?>
      <?php snippet('fold/link-block-embed', ['embed' => $embed]) ?>
    <?php endif; ?>
    <?php if ($pdf = $fold->files()->template('fold-pdf')->first()): ?>
      <?php snippet('fold/link-block-pdf', ['pdf' => $pdf]) ?>
    <?php endif ?>
  </div>
</div>
