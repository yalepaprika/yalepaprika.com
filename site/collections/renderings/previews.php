<?php

return function ($site) {
    return $site->find('renderings/previews')->children();
};
