<?php while (have_posts()) : the_post(); ?>
<header class="basic-header">
  <img class="icon-small" src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-heteiland-full-black.svg" alt="Sportclub het Eiland extras">
  <h1><?php the_title(); ?></h1>
</header>

<div class="events">

    <div class="events__event">
      <div class="event__content" style="width:100%">
        <p><?php the_post_thumbnail('large'); ?></p>
        <p><?php the_content(); ?></p>
      </div>
    </div>


</div>
  <?php endwhile; ?>
<?php get_template_part('templates/form-dialog'); ?>
