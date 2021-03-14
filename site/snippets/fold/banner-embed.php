<?php if ($embed = $fold->embedPage()): ?>
  <?php snippet('banner-website/banner', [
    'title' => 'Visit Microsite',
    'url' => $embed->url(),
    'description' => 'Visit the online edition of <em>' . $fold->title() . '</em>, a custom microsite designed for this issue.'
  ]) ?>
<?php endif; ?>