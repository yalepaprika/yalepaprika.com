<?php

namespace YalePaprika;

use Kirby\Cms\File;
use Kirby\Cms\Asset;
use Exception;

class PreviewRenderer {

  protected $fold;

  public function __construct($fold)
  {
      $this->fold = $fold;
  }

  public function render()
  {
    if ($preview = collection('renderings/previews')->first()) {
      if ($map = $preview->files()->template('preview-map')->first()) {
        $blank = new Asset('assets/fold-viewer/blank.png');
        
        $front = $this->fold->files()->template('fold-front')->first() ?? $blank;
        $back = $this->fold->files()->template('fold-back')->first() ?? $blank;

        if ($output = $this->fold->files()->template('fold-preview')->first()) $output->delete();
        
        $output = File::create([
          'filename' => $this->fold->slug() . '-preview.png',
          'parent' => $this->fold,
          'source' => $blank->root(),
          'template' => 'fold-preview'
        ]);

        $command = [];
        $command[] = option('yalepaprika.renderer.bin');
        $command[] = $front->root();
        $command[] = $back->root();
        $command[] = '-colorspace sRGB -type truecolor';
        $command[] = '-resize 888x1750\!';
        $command[] = '\( -clone 0,1 -append \)';
        $command[] = '\( -clone 1,0 -append -flop \)';
        $command[] = '-delete 0,1';
        $command[] = $map->root();
        $command[] = '\( -clone 0,2 -alpha set -compose Distort -composite \)';
        $command[] = '\( -clone 1,2 -alpha set -compose Distort -composite \)';
        $command[] = '-delete 0,1';
        $command[] = '\( -clone 1,2 -compose blend  -define compose:args=10 -composite \)';
        $command[] = '-delete 1,2';
        $command[] = '\( -clone 0   -channel B -separate +channel \)';
        $command[] = '\( -clone 1,2 -compose Multiply -composite \)';
        $command[] = '-delete 1,2';
        $command[] = '\( -clone 1,0 -compose DstIn -composite \)';
        $command[] = '-delete 0,1';
        $command[] = '-strip';
        $command[] = sprintf('-limit thread 1 "%s"', $output->root());
        
        $command = implode(' ', array_filter($command));

        exec($command, $results, $return);

        if ($return !== 0) {
          throw new Exception('The preview rendering could be created: ' . $command);
        }
      }
    }
  }

}