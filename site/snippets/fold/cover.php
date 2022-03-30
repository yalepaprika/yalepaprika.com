<div id="fold-cover" class="fold-cover font--inverted background-paprika d-flex flex-column justify-content-between space-inside-after-20 space-after-20">
  <div>
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <div class="rule rule--white">
      <div class="container-xxxl">
        <h1 class="font-title" aria-hidden="true">
          <?= $fold->title() ?>
        </h1>
      </div>
    </div>
  </div>
  <div class="container-xxxl font-heading">
    <?php snippet('fold/subtitle', ['fold' => $fold]) ?>
  </div>
</div>