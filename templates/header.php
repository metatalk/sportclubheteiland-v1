<a href="#" class="nav-trigger" data-dialog="navigation">
  Menu
</a>

<?php if($post->post_name != 'we-are-sportclub-het-eiland' && $post->post_parent != '2566'): ?>

<a href="/we-are-sportclub-het-eiland" class="nav-trigger--sec">
we are <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-heteiland-full.svg" alt="Sportclub Het Eiland" width="19">
</a>

<?php endif; ?>

<div id="navigation" class="dialog dialog--menu">
  <div class="dialog__overlay"></div>
  <div class="dialog__content dialog__content--sports dialog__animate">

    <div class="dialog--menu__info dialog--menu__info--mobile">
      <p><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-heteiland-black.svg" class="sport__logo__sub" alt="Sportclub het Eiland"></a></p>
      <?php
      wp_nav_menu(['menu' => 'submenu', 'menu_class' => 'dialog--menu__pages']);
      ?>
    </div>

    <div class="dialog--menu__sports">
      <?php
      $sports = get_posts(array(
          'post_type' => 'sport',
          'posts_per_page' => 10,
          'orderby' => 'menu_order',
          'order' => 'ASC'
      ));
      ?>
      <?php foreach($sports as $sport): ?>
        <a href="<?php echo get_permalink($sport->ID); ?>" class="dialog--menu__sport dialog--menu__sport--<?php echo $sport->post_name; ?>">
          <?php $bg = get_field('achtergrond',$sport->ID); ?>
          <div class="dialog--menu__sport-bg" style="background-image: url(<?php echo $bg['sizes']['large']; ?>);"></div>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-<?php echo $sport->post_name; ?>-eiland.svg" class="sport__logo__main" alt="<?php the_title(); ?>">
        </a>
      <?php endforeach; ?>
    </div>

    <div class="dialog--menu__info">
      <p class="dialog--menu__logo"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-heteiland-black.svg" class="sport__logo__sub" alt="Sportclub het Eiland"></a></p>
      <?php
      wp_nav_menu(['menu' => 'submenu', 'menu_class' => 'dialog--menu__pages dialog--menu__pages--desktop']);
      ?>
      <div class="dialog--menu__hours">
          <h3>Openingsuren</h3>
          <ul>
              <li><span class="hour-list-label">Maandag</span><span class="hour-list-label">7:00 - 23:00</span></li>
              <li><span class="hour-list-label">Dinsdag</span><span class="hour-list-label">7:00 - 23:00</span></li>
              <li><span class="hour-list-label">Woensdag</span><span class="hour-list-label">7:00 - 23:00</span></li>
              <li><span class="hour-list-label">Donderdag</span><span class="hour-list-label">7:00 - 23:00</span></li>
              <li><span class="hour-list-label">Vrijdag</span><span class="hour-list-label">7:00 - 22:00</span></li>
              <li><span class="hour-list-label">Zaterdag</span><span class="hour-list-label">9:30 - 14:00</span></li>
              <li><span class="hour-list-label">Zondag</span><span class="hour-list-label">9:30 - 14:00</span></li>
              <li><small>Op feestdagen zijn we open van 9:30 tot 14u.</small></li>
          </ul>
          <p>
              <small><a href="/uurrooster">Uurroosters lessen & activiteiten</a></small>
          </p>
      </div>
      <div class="dialog-menu__contact">
          <a href="mailto:info@sportclubheteiland.be">info@sportclubheteiland.be</a>
          <br>03/227.15.37
      </div>
    </div>

    <a class="dialog__close" data-dialog-close>×</a>
  </div>
</div>
