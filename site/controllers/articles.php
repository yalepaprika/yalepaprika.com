<?php

return function ($site, $page) {
  $groups = collection('articles/by-fold');

  $pagination = Pagination::For($groups, ['limit' => 5]);    

  $groups = $groups->slice($pagination->offset(), $pagination->limit());

  return [
    'groups' => $groups,
    'pagination' => $pagination
  ];
};