<?php

return function ($site) {
    return $site->find('banners')->children();
};
