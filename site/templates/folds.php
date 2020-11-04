<?php snippet('header') ?>
<div class="stack">
  <?php snippet('page/menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <?php foreach($folds = collection('folds')->paginate(20) as $fold): ?>
      <article>
        <?php snippet('fold/cover', ['fold' => $fold]) ?>
      </article>
    <?php endforeach ?>
    <?php snippet('folds/pagination', ['folds' => $folds]) ?>
  </main>
  <?php snippet('page/footer', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
</div>
<?php snippet('footer') ?>
