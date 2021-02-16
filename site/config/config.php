<?php

return [
    'markdown' => [
        'extra' => true
    ],
    'smartypants' => true,
    'bnomei.robots-txt.sitemap' => \Kirby\Http\URL::to('/sitemap.xml'),
    'omz13.xmlsitemap.disableImages' => true,
    'omz13.xmlsitemap.includeUnlistedWhenTemplateIs' => [
        'fold',
        'folds',
        'contributor',
        'contributors'
    ]
];
