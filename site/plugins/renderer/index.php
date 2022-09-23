<?php

load([
    'yalepaprika\\previewrenderer' => 'src/Renderer.php',
    'yalepaprika\\renderalljob' => 'src/RenderAllJob.php',
], __DIR__);

use YalePaprika\PreviewRenderer;

function render($file) {
  if ($file->template() == 'fold-front' || $file->template() == 'fold-back') {
    $renderer = new PreviewRenderer($file->parent());
    $renderer->render();
  }
}

Kirby::plugin('yalepaprika/renderer', [
  'options' => [
    'bin' => 'convert',
    'jobs' => [
        'renderPreview' => function (Kirby\Cms\Page $page = null, string $data = null) {
            if ($page === null) {
                $page = site()->index(true)->findByID($data);
            }

            kirby()->impersonate();
            $renderer = new PreviewRenderer($page);
            $renderer->render();

            return [
                'status' => 200,
                'reload' => true,
                'label' => 'Rendering complete',
            ];
        },
        'renderAll' => 'YalePaprika\\RenderAllJob',
    ],
  ],
  'hooks' => [
    'file.create:after' => function ($file) {
        render($file);
    },
    'file.replace:after' => function ($newFile, $oldFile) {
        render($newFile);
    }
  ]
]);
