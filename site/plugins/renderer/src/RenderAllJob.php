<?php

namespace YalePaprika;

use YalePaprika\PreviewRenderer;

use Exception;
use Kirby\Cms\Page;
use Kirby\Cms\Pages;
use Bnomei\Janitor;
use Bnomei\JanitorJob;

final class RenderAllJob extends JanitorJob
{
    public function job(): array
    {
        $climate = Janitor::climate();
        $progress = null;
        $verbose = $climate ? $climate->arguments->defined('verbose') : false;
        $time = time();

        kirby()->impersonate('kirby');
        // visit all pages to generate media/*.job files
        $folds = kirby()->site()->find('folds')->children();
        $countPages = $folds->count();
        $visited = 0;

        if ($climate) {
            $climate->out('Folds: ' . $countPages);
            $climate->out('Rendering...');
        }
        if ($countPages && $climate) {
            $progress = $climate->progress()->total($countPages);
        }
        $failed = [];

        foreach ($folds as $fold) {
            try {
                $renderer = new PreviewRenderer($fold);
                $renderer->render();
            } catch (Exception $ex) {
                $failed[] = $fold->slug() . ': ' . $ex->getMessage();
            }

            $visited++;
            if ($progress && $climate) {
                $progress->current($visited);
            }
        }

        if ($climate) {
            if (count($failed)) {
                $climate->out('Render failed: ' . count($failed));
                foreach ($failed as $fail) {
                    $climate->red($fail);
                }
            }
        }

        $duration = time() - $time;

        return [
            'status' => $visited > 0 ? 200 : 204,
            'duration' => $duration,
        ];
    }
}