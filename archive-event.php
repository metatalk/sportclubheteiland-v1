<header class="basic-header">
  <img class="icon-small" src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-heteiland-full-black.svg" alt="Sportclub het Eiland extras">
  <h1>Events</h1>
</header>

<div class="events">
  <?php while (have_posts()) : the_post(); ?>
    <div class="events__event">
      <div class="event__thumb">
        <div><?php the_post_thumbnail('medium'); ?></div>
      </div>
      <div class="event__content">
        <h2><?php the_title(); ?></h2>
        <p><?php the_excerpt(); ?></p>
      </div>
    </div>

  <?php endwhile; ?>
</div>

<?php get_template_part('templates/form-dialog'); ?>
