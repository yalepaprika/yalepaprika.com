<?php

return function ($site, $page) {

    $folds = $site->kirby()->collection('folds')->paginate(20);
    $slots = [];

    foreach ($folds as $fold) {
        switch ($fold->randomSpreadIndex) {
            case 0:
                $width = 25.0;
                $height = 25.0;
                break;
            case 1:
                $width = 25.0;
                $height = 50.0;
                break;
            default:
                $width = 50.0;
                $height = 50.0;
        }

        $slots[] = [
            'width' => $width,
            'height' => $height,
            'marginLeft' => 0.0,
            'marginRight' => 0.0,
            'marginTop' => 0.0,
            'marginBottom' => 0.0
        ];
    }

    // for each fold, construct slot
    $layout = \Packer\layout($slots, 100.0, 100.0);

    return [
        'folds' => $folds,
        'layout' => $layout,
    ];
};