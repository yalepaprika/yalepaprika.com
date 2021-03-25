<?php 

$rows = [];
$prevHalf = null;

foreach ($banners as $banner) {
  if ($banner->banner_width() == 'half') {
    if ($prevHalf) {
      $rows[] = [
        'container' => 'half',
        'contents' => [ $prevHalf, $banner ]
      ];
      $prevHalf = null;
    } else {
      $prevHalf = $banner;
    }
  } else {
    $rows[] = [
      'container' => 'full',
      'contents' => [ $banner ]
    ];
  }
}

if ($prevHalf) {
  $rows[] = [
    'container' => 'half',
    'contents' => [ $prevHalf ]
  ];
}

?>

<?php foreach ($rows as $row): ?>
  <?php if ($row['container'] == 'half'): ?>
    <div class="cluster cluster-2-2-column cluster-stack cluster-stretch cluster-switcher">
      <div class="_cluster">
        <?php foreach ($row['contents'] as $banner): ?>
          <?php snippet($banner->intendedTemplate()->name() . '/banner', ['banner' => $banner ]) ?>
        <?php endforeach; ?>
      </div>
    </div>
  <?php else: ?>
    <?php foreach ($row['contents'] as $banner): ?>
      <?php snippet($banner->intendedTemplate()->name() . '/banner', ['banner' => $banner ]) ?>
    <?php endforeach; ?>
  <?php endif; ?>
<?php endforeach; ?>
