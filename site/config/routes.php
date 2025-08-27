<?php

function findArticleBySlug($slug) {
  $folds = site()->find('folds');
  $articles = $folds->grandChildren();
  foreach ($articles as $article) {
      if ($article->slug() == $slug) {
          return $article;
      }
  }
  return null;
}

return [
  [
    'pattern' => 'logout',
    'action'  => function() {

        if ($user = kirby()->user()) {
            $user->logout();
        }

        go('/');

    }
  ],
  [
      'pattern' => 'analytics',
      'action' => function() {
          go('https://plausible.io/share/paprikamagazine.com?auth=FeBGavbz3TpDEW79_RGqD');
      }
  ],
  [
    'pattern' => 'articles/(:any)',
    'action' => function ($any) {
        $article = findArticleBySlug($any);
        if ($article) {
            go($article->url(), 301);
            return;
        }
        $this->next();
    }
  ],
  [
      'pattern' => 'archive/folds',
      'action' => function () {
          go(site()->find('folds')->url(), 301);
      }
  ],
  [
      'pattern' => 'archive/articles',
      'action' => function () {
          go('/articles', 301);
      }
  ],
  [
      'pattern' => 'archive/contributors',
      'action' => function () {
          go(site()->find('contributors')->url(), 301);
      }
  ],
  [
      'pattern' => '(:any)',
      'action' => function ($any) {
          $page = page($any);
          if ($page) {
              $this->next();
              return;
          }
          $article = findArticleBySlug($any);
          if ($article) {
              go($article->url(), 301);
              return;
          }
          $this->next();
      }
  ],
];
