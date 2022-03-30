<?php

return function ($site) {
  return $site->find('contributors')->children()->sortBy(function ($contributor) {
    return $contributor->sortName();
  }, 'asc')->group(function ($contributor) {
    $normalized = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $contributor->sortName());
    $first_letter = substr($normalized, 0, 1);
    if (preg_match("/^[a-zA-Z]$/", $first_letter)) {
      return strtoupper($first_letter);
    } else {
      return '#';
    }
  });
};
