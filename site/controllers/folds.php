<?php

return function ($site, $page) {
  $groups = collection('folds/by-volume');

  $pagination = Pagination::For($groups, ['limit' => 2]);    

  $groups = $groups->slice($pagination->offset(), $pagination->limit());

  return [
    'groups' => $groups,
    'pagination' => $pagination
  ];
};