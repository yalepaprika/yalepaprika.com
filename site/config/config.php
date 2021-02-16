<?php

use \Kirby\Http\URL;

return [
    'markdown' => [
        'extra' => true
    ],
    'smartypants' => true,
    'bnomei.robots-txt.sitemap' => URL::to('/sitemap.xml'),
    'omz13.xmlsitemap.disableImages' => true,
    'omz13.xmlsitemap.includeUnlistedWhenTemplateIs' => [
        'fold',
        'folds',
        'contributor',
        'contributors'
    ]
];
