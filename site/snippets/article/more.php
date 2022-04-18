<?php snippet('articles/cards', ['articles' => $article->moreByContributors(), 'title' => 'More by ' . pluralize('Contributor', $article->contributors()->toPages()->count())]) ?>
