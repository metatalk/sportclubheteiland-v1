<?php
/**
 * Template Name: Clubplanner
 */
?>

<article class="clubplanner">
    <div class="clubplanner__inner">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-heteiland-black.svg">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/content', 'page'); ?>
        <?php endwhile; ?>
    </div>
    <div class="clubplanner__form">
      <iframe style="border: none;" src="https://cloud3.clubplanner.be/Heteiland/registration?menu=0" width="100%;" height="600px"></iframe>
    </div>
</article>
