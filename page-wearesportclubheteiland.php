<?php /* Template Name: We Are Sportclub het Eiland overview */ ?>

<?php while (have_posts()) : the_post(); ?>

    <div class="weare">

        <header class="weare__header">

          <div>
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-heteiland-full.svg" alt="Sportclub Het Eiland">
            <h2>We are <br> Sportclub het Eiland</h2>
            <p class="lead">
              Dertien gezichten, dertien unieke verhalen over bewegen. <br><br> We willen onze leden stimuleren om elkaar te (her)activeren, maar ook andere mensen warm maken om te bewegen. <br><br>In deze video’s ontdek je wat hun inspireert en motiveert.
            </p>
            <h4>Volg ons Youtube kanaal</h4>
            <p>
              <script src="https://apis.google.com/js/platform.js"></script>

              <div class="g-ytsubscribe" data-channelid="UC35VEdIbaJfXbAfjN_JhSNQ" data-layout="default" data-count="hidden"></div>
            </p>
          </div>

        </header>

        <div class="weare__videos">

            <?php
              $videos = get_pages(array(
                'parent' => $post->ID,
                'sort_column' => 'menu_order'
              ));

              foreach($videos as $video) {
                $image = get_field('foto',$video->ID);
                echo '<a href="'.get_permalink($video->ID).'">';
                echo '<div class="weare__videothumb" style="background-image:url('.$image['sizes']['medium'].')">';
                echo '<h3>'.get_field('quote',$video->ID).'<small>'.$video->post_title.'</small></h3>';
                echo '</div>';
                echo '</a>';
              }
            ?>

            <?php get_template_part('templates/footer'); ?>

        </div>


    </div>


<?php endwhile; ?>

<?php get_template_part('templates/form-dialog'); ?>
