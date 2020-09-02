<?php

return function ($site) {
    return $site->find('contributors')->children()->sortBy('title', 'asc');
};
