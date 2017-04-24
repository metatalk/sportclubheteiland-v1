<?php /* Template Name: Uurrooster */ ?>

<?php while (have_posts()) : the_post(); ?>

    <div class="schedule">

        <header class="schedule__header" style="background-image: url(<?php echo get_template_directory_uri(); ?>/dist/images/content/uurrooster.jpg)">
            <div>
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-heteiland-full.svg" alt="Sportclub Het Eiland">
            <h2>Uurrooster</h2>
            <?php if(!empty($post->post_parent)): ?>
                <h3><?php the_title(); ?></h3>
            <?php endif; ?>

                <div class="schedule__footer">
                    <a href="https://cloud3.clubplanner.be/Heteiland/Account/LoginMember" class="button button--white">Activiteit boeken</a>
                </div>
            </div>
        </header>

        <div class="schedule__rooster">

          <div class="schedule__switch">
            <a href="/uurrooster" class="schedule__switch-link <?php echo $post->post_name == 'uurrooster' ? 'active' : ''; ?>">Groepslessen</a>
            <a href="/uurrooster/urban-cross-workout" class="schedule__switch-link <?php echo $post->post_name == 'urban-cross-workout' ? 'active' : ''; ?>">Urban Cross Workout</a>
          </div>

            <?php

            $fields = get_fields();

            if( $fields )
            {
                foreach( $fields as $field_name => $value )
                {
                    $field = get_field_object($field_name, false, array('load_value' => false));

                    echo '<div class="schedule__day">';
                    echo '<h3>' . $field_name . '</h3>';

                    if( have_rows($field_name) ):

                        echo '<table class="schedule__table">';

                            while ( have_rows($field_name) ) : the_row();

                                $sport = false;

                                if(!empty(get_sub_field('sport'))) {
                                    $sportObject = get_sub_field('sport');
                                    $sportTitle = get_the_title($sportObject);
                                    //if($sportTitle != get_sub_field('evenement')) {
                                        $sportLink = get_permalink($sportObject);
                                        $sport = '<small class="schedule__sport"><a href="'.$sportLink.'">'.$sportTitle.'</a></small>';
                                    //}
                                }

                                echo '<tr>';
                                    echo '<td class="schedule__title">'.get_sub_field('evenement').$sport.'</td>';
                                    echo '<td class="schedule__hour">'.get_sub_field('start').' - '.get_sub_field('einde').'</td>';
                                echo '</tr>';

                            endwhile;

                        echo '</table>';

                    else :

                    endif;
                    echo '</div>';
                }
            }

            ?>


            <?php get_template_part('templates/footer'); ?>


        </div>


    </div>


<?php endwhile; ?>

<?php get_template_part('templates/form-dialog'); ?>
