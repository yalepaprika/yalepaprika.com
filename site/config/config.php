<?php

return [
    'routes' => require_once 'routes.php',
    'markdown' => [
        'extra' => true
    ],
    'smartypants' => true,
    'bnomei.robots-txt.sitemap' => '/sitemap.xml',
    'omz13.xmlsitemap.disableImages' => true,
    'omz13.xmlsitemap.includeUnlistedWhenTemplateIs' => [
        'fold',
        'folds',
        'contributor',
        'contributors'
    ]
];
