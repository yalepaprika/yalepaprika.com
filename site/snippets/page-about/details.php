<div id="page-about-details" class="about-details box-card box-card-large-inset stack">
  <div class="about-details-main cluster cluster-stack">
    <div class="_cluster">
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Coordinating Editors', 'pages' => $about->coordinating_editors()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Graphic Designer Liasons', 'pages' => $about->graphic_design_liaisons()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Publishers', 'pages' => $about->publishers()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Archivists', 'pages' => $about->archivists()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Producers', 'pages' => $about->producers()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Web Editors', 'pages' => $about->web_editors()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => 'Website Design & Development', 'pages' => $about->website_design_development()->toPages()]) ?>
      <?php snippet('utilities/detail-list/pages-x', ['title' => '3D Modeling & Rendering', 'pages' => $about->website_3d_rendering()->toPages()]) ?>
    </div>
  </div>
</div>
