<?php

return function ($site, $page) {
  $groups = collection('contributors/by-letter');

  $pagination = Pagination::For($groups, ['limit' => 5]);    

  $groups = $groups->slice($pagination->offset(), $pagination->limit());

  return [
    'groups' => $groups,
    'pagination' => $pagination
  ];
};