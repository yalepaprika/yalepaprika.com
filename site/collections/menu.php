<?php

return function ($site) {
    $collection = new Pages();
    $collection->add($site->page('folds'));
    $collection->add($site->page('contributors'));
    return $collection;
};
