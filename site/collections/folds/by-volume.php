<?php

return function ($site) {
    return $site->find('folds')->children()->sortBy('volume', 'desc', 'publication_date', 'desc')->group(function ($fold) {
        return $fold->volume();
    });
};
