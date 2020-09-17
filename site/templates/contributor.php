<?php snippet('header') ?>
<div class="stack">
  <?php snippet('menu', ['home' => $site, 'menu' => collection('menu'), 'submenu' => collection('submenu')]) ?>
  <main>
    <article class="stack">
      <?php snippet('page/title', ['page' => $page]) ?>
      <div class="columns">
        <div class="column-left">
          <div class="stack">
            <?php snippet('utilities/detail-list/pages-y', ['title' => 'Articles', 'pages' => $articles]) ?>
          </div>
        </div>
      </div>
    </article>
  </main>
</div>
<?php snippet('footer') ?>
