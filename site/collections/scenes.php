<?php

return function ($site) {
    return $site->find('scenes')->children();
};
