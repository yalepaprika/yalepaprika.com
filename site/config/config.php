<?php

use YalePaprika\PreviewRenderer;

return [
    'routes' => require_once 'routes.php',
    'markdown' => [
        'extra' => true
    ],
    'smartypants' => true,
    'bnomei.redirects.querystring' => false,
    'bnomei.robots-txt.sitemap' => '/sitemap.xml',
    'omz13.xmlsitemap.disableImages' => true,
    'omz13.xmlsitemap.includeUnlistedWhenTemplateIs' => [
        'fold',
        'folds',
        'contributor',
        'contributors'
    ],
    'bnomei.janitor.jobs-extends' => [
        'yalepaprika.renderer.jobs'
    ],
    'floriankarsten.plausible' => [
        'domain' => 'yalepaprika.com',
        'sharedLink' => 'https://plausible.io/share/yalepaprika.com?auth=FeBGavbz3TpDEW79_RGqD'
    ],
    'thumbs' => [
        'driver' => 'im'
    ],
    'sylvainjule.footnotes.back'  => '&#8617;&#xFE0E;'
];
