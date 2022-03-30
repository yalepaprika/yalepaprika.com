<footer id="page-footer" class="page-footer space-inside-after-10">
  <div class="page-footer__content font-heading background-gray-100 space-inside-before-20 space-inside-after-20 space-after-10">
    <div class="container-xxxl">  
      <div class="font--secondary space-after-100">
        <p><em>Paprika!</em> is the often-weekly broadsheet published by the students of the Yale School of Architecture and Yale School of Art.</p>
        <p>Paprika! is a 501(c)(3) nonprofit organization.</p>
        <address>
          Rudolph Hall<br/>
          180 York St, New Haven, CT 06511
        </address>
      </div>
      <div class="page-footer__menu">
        <?php snippet('page/menu', ['home' => $home, 'menu' => $menu, 'submenu' => $submenu]) ?>
      </div>
    </div>
  </div>
  <div class="container-xxxl">
    <div class="page-footer__furniture font-detail font--secondary row justify-content-between">
      <div class="col-auto">
        <div class="page-footer__circles"></div>
      </div>
      <div class="col">
        <div class="page-footer__dots"></div>
      </div>
      <div class="col-auto"><em>Paprika!</em> © <?= date("Y"); ?></div>
    </div>
  </div>
</footer>
