<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <?php snippet('page/title', ['title' => $page->title()]) ?>
      <div id="pagination">
        <?php foreach($groups as $letter => $contributors): ?>
          <div class="pagination-item">
            <?php snippet('contributors/list', ['title' => strtoupper($letter), 'contributors' => $contributors]) ?>
          </div>
        <?php endforeach ?>
      </div>
      <?php snippet('page/more', ['model' => 'Contributor', 'pagination' => $pagination]) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
