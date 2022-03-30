<?php

return function ($site) {
    return $site->find('contributors')->children()->sortBy(function ($contributor) {
        return $contributor->sortName();
    }, 'asc');
};
