<div class="page-about-details font--inverted background-black space-after-20">
  <div class="container-xxxl">
    <h3 class="sr-only">About Page Details</h3>
    <div class="page-about-details__details row row-cols-2 row-cols-md-4 space-inside-before-40">
      <?php snippet('page/role', [
        'title' => 'Coordinating Editor',
        'pages' => $about->coordinating_editors()->toPages()
      ]) ?>
      <?php snippet('page/role', [
        'title' => 'Graphic Design Liason',
        'pages' => $about->graphic_design_liason()->toPages()
      ]) ?>
      <?php snippet('page/role', [
        'title' => 'Publisher',
        'pages' => $about->publishers()->toPages()
      ]) ?>
      <?php snippet('page/role', [
        'title' => 'Archivist',
        'pages' => $about->archivists()->toPages()
      ]) ?>
      <?php snippet('page/role', [
        'title' => 'Board of Directors',
        'pages' => $about->board_of_directors()->toPages()
      ]) ?>
      <?php snippet('page/role', [
        'title' => 'Producer',
        'pages' => $about->producers()->toPages()
      ]) ?>
      <?php snippet('page/role', [
        'title' => 'Web Editor',
        'pages' => $about->web_editors()->toPages()
      ]) ?>
      <?php snippet('page/role', [
        'title' => 'Website Design & Development',
        'pages' => $about->website_design_development()->toPages()
      ]) ?>
      <?php snippet('page/role', [
        'title' => 'Website 3D Rendering',
        'pages' => $about->website_3d_rendering()->toPages()
      ]) ?>
    </div>
  </div>
</div>
