<?php /* Template Name: We Are Sportclub het Eiland video */ ?>

<?php while (have_posts()) : the_post(); ?>

    <div class="weare weare--detail">

        <header class="weare__header weare__header--detail">
          <div>
           <div class="weare__logo">
             <a href="/we-are-sportclub-het-eiland">We are <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-heteiland-full.svg" alt="Sportclub Het Eiland"></a>
           </div>
           <?php echo '<h1 class="weare__quote">'.get_field('quote').'<small>'.get_the_title().'</small></h1>'; ?>
           <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_field('youtube_url') ?>" class="weare__share">
             <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-facebook-white.svg" alt="Deel op Facebook">
             Deel verhaal op Facebook
           </a>
           <div class="down">

           </div>
         </div>
        </header>

        <?php $image = get_field('foto'); ?>

        <div class="weare__videos weare__videos--detail">

            <div class="weare__videofull" style="background-image:url(<?php echo $image['sizes']['background']; ?>)" data-dialog="youtube">
              <div class="">
                <img src="<?php echo get_template_directory_uri() ?>/dist/images/icon-play.svg" alt="Bekijk video">
              </div>
            </div>

            <?php get_template_part('templates/footer'); ?>

        </div>

    </div>

<?php endwhile; ?>

<?php //get_template_part('templates/form-dialog'); ?>
<?php get_template_part('templates/form-video'); ?>
