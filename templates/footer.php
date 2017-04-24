
<div class="home-footer">

  <?php
  wp_nav_menu(['menu' => 'submenu', 'menu_class' => 'home-footer__pages']);
  ?>
  <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-heteiland.svg" class="home-footer__icon">
  <div class="home-footer__hours">
    <h3>Openingsuren</h3>
    <ul>
      <li>Maandag t.e.m. donderdag &mdash;  7:00 - 23:00</li>
      <li>Vrijdag &mdash;  7:00 - 22:00</li>
      <li>Zaterdag, Zondag, feestdagen &mdash; 9:30 - 14:00</li>
    </ul>
  </div>
  <div class="home-footer__contact">
    <a href="mailto:info@sportclubheteiland.be">info@sportclubheteiland.be</a>
    <br>03/227.15.37
  </div>

</div>
