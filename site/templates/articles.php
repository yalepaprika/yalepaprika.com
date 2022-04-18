<?php snippet('header') ?>
<div id="swup">
  <div class="page">
    <?php snippet('page/nav', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
    <main>
      <?php snippet('page/title', ['title' => $page->title()]) ?>
      <div id="pagination">
        <?php foreach($groups as $id => $articles): ?>
          <div class="pagination-item">
            <?php snippet('articles/cards', ['title' => $site->find($id)->title(), 'articles' => $articles]) ?>
          </div>
        <?php endforeach ?>
      </div>
      <?php snippet('page/pagination', ['model' => 'Article', 'pagination' => $pagination]) ?>
    </main>
  </div>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
