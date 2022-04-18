<?php snippet('articles/cards', [
  'articles' => $articles,
  'title' => 'Recent Articles',
  'children' => snippet('page/more', ['model' => 'Article', 'href' => $parent->url()], true)
]) ?>
