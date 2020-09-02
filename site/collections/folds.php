<?php

return function ($site) {
    return $site->find('folds')->children()->sortBy('publication_date', 'desc');
};
