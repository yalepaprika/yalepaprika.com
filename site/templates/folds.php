<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main class="stack">
    <?php foreach($folds = collection('folds')->paginate(20) as $fold): ?>
      <article>
        <?php snippet('fold/cover', ['fold' => $fold]) ?>
      </article>
    <?php endforeach ?>
    <?php snippet('folds/pagination', ['folds' => $folds]) ?>
  </main>
</div>
<?php snippet('footer') ?>
