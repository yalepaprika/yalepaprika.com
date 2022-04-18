<?php

return function ($site) {
    return $site->find('folds')->children()->sortBy('volume', 'desc', 'publication_date', 'desc')->slice(0, 4);
};
