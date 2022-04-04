<?php

return function ($site) {
  return $site->find('contributors')->children()->map(function ($contributor) {
    $contributor->sortFirstLetter = substr($contributor->sortName(), 0, 1);
    $contributor->sortIsAlphabetical = preg_match("/^[a-zA-Z]$/", $contributor->sortFirstLetter);
    return $contributor;
  })->sortBy('sortIsAlphabetical', 'desc', 'sortName', 'asc')->group(function ($contributor) {
    if ($contributor->sortIsAlphabetical) {
      return strtoupper($contributor->sortFirstLetter);
    } else {
      return '#';
    }
  });
};
