<?php

return function ($site) {
    return $site->find('renderings/scenes')->children();
};
