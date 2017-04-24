<?php while (have_posts()) : the_post(); ?>
    <article class="sport sport--<?php echo $post->post_name; ?>">
        <?php
            $bg = get_field('achtergrond');
        ?>
        <div class="sport__header" style="background-image: url(<?php echo $bg['sizes']['background']; ?>);">
            <div class="sport__header-img"></div>
        </div>
        <div class="sport__content">

            <div class="content-block content-block--hero">
                <div class="sport__logo-bg" style="background-image: url(<?php echo $bg['sizes']['large']; ?>);"></div>
                <div class="sport__logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-heteiland.svg" class="sport__logo__sub" alt="Sportclub het Eiland">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-<?php echo $post->post_name; ?>-eiland.svg" class="sport__logo__main" alt="<?php the_title(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-heteiland.svg" class="sport__logo__icon" alt="<?php the_title(); ?>">

                </div>
                <p class="lead">
                    <?php the_field('intro'); ?>
                </p>
                <?php if(get_field('action_title')): ?>
                    <div class="cta-bar"><a data-dialog="cta" class="btn"><?php the_field('action_title'); ?></a></div>
                <?php endif; ?>
                <div class="down">
                    <a href="#" class="down__arrow">
                        <svg width="16px" height="9px" viewBox="0 0 16 9" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g  stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                                <polyline id="Line" class="down__arrow-svg" stroke-width="2" points="1 1 8 8 15 1"></polyline>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>

            <?php

            // check if the flexible content field has rows of data
            if( have_rows('content_stukken') ):

                $i = 0;

                // loop through the rows of data
                while ( have_rows('content_stukken') ) : the_row();

                    $i++;

                    $classes = 'content-block--'.get_row_layout();
                    $classes .= $i == 1 ? ' content-block--first' : '';

                    if(empty(get_sub_field('title'))) {
                        $classes .= ' content-block--titleless';
                    }

                    echo '<div class="content-block '.$classes.'">';

                    if( get_row_layout() == 'info' ):

                        if(get_sub_field('title')) {
                            echo '<h2>'.get_sub_field('title').'</h2>';
                        }

                        echo '<div class="info-content">'.get_sub_field('content').'</div>';

                    elseif( get_row_layout() == 'afbeelding' ):

                        $image = get_sub_field('image');

                        echo '<img src='.$image['sizes']['large'].'>';

                    elseif( get_row_layout() == 'quote'):

                        echo '<blockquote>'.get_sub_field('quote').'</blockquote>';

                    elseif( get_row_layout() == 'gallerij'):

                        $images = get_sub_field('fotos');
                        $title = get_sub_field('titel');

                        if($title) {
                            echo '<h2>'.$title.'</h2>';
                        }

                        if( $images ): ?>
                            <div class="gallery">
                                <?php foreach( $images as $image ): ?>
                                    <div class="gallery__item">
                                        <img src="<?php echo $image['sizes']['gallery']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif;

                    endif;

                echo '</div>';

                endwhile;

            else :

                // no layouts found

            endif;

            ?>

            <div class="sport__social-icons">
                <?php
                    $ig_url = !empty(get_field('instagram_link')) ? get_field('instagram_link')  : 'sportclubheteiland';
                    $fb_url = !empty(get_field('facebook_link')) ? get_field('facebook_link')  : 'sportclubheteiland';
                ?>
                <a class="social-media-icon" href="https://www.facebook.com/<?php echo $fb_url; ?>">
                    <svg viewBox="0 0 109 109" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Group-2">
                                <g id="Group">
                                    <rect id="Rectangle" class="social-media-icon__icon" transform="translate(54.447222, 54.447222) translate(-54.447222, -54.447222) " x="15.9472222" y="15.9472222" width="77" height="77"></rect>
                                    <path d="M48.875,46.6666667 L43,46.6666667 L43,54.5 L48.875,54.5 L48.875,78 L58.6666667,78 L58.6666667,54.5 L65.7989167,54.5 L66.5,46.6666667 L58.6666667,46.6666667 L58.6666667,43.402125 C58.6666667,41.5319167 59.0426667,40.7916667 60.8502083,40.7916667 L66.5,40.7916667 L66.5,31 L59.0426667,31 C52.0005,31 48.875,34.1000417 48.875,40.0377083 L48.875,46.6666667 L48.875,46.6666667 Z" id="Shape" fill="#FFFFFF"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
                <a class="social-media-icon" href="https://www.instagram.com/<?php echo $ig_url; ?>/">
                    <svg viewBox="0 0 109 109" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Group">
                                <rect id="Rectangle" class="social-media-icon__icon" transform="translate(54.447222, 54.447222)  translate(-54.447222, -54.447222) " x="15.9472222" y="15.9472222" width="77" height="77"></rect>
                                <g id="iconmonstr-instagram-11" transform="translate(31.000000, 31.000000)" fill="#FFFFFF">
                                    <path d="M23.5,4.235875 C29.7745,4.235875 30.5186667,4.259375 32.9979167,4.37295833 C39.3664167,4.66279167 42.341125,7.6845 42.6309583,14.006 C42.7445417,16.4832917 42.7660833,17.2274583 42.7660833,23.5019583 C42.7660833,29.7784167 42.7425833,30.520625 42.6309583,32.9979167 C42.3391667,39.3135417 39.3722917,42.341125 32.9979167,42.6309583 C30.5186667,42.7445417 29.7784167,42.7680417 23.5,42.7680417 C17.2255,42.7680417 16.4813333,42.7445417 14.0040417,42.6309583 C7.619875,42.3391667 4.66083333,39.30375 4.371,32.9959583 C4.25741667,30.5186667 4.23391667,29.7764583 4.23391667,23.5 C4.23391667,17.2255 4.259375,16.4832917 4.371,14.0040417 C4.66279167,7.6845 7.62966667,4.66083333 14.0040417,4.371 C16.4832917,4.259375 17.2255,4.235875 23.5,4.235875 L23.5,4.235875 Z M23.5,9.51206706e-16 C17.1177917,9.51206706e-16 16.3187917,0.0274166667 13.812125,0.141 C5.27770833,0.532666667 0.534625,5.26791667 0.142958333,13.8101667 C0.0274166667,16.3187917 0,17.1177917 0,23.5 C0,29.8822083 0.0274166667,30.6831667 0.141,33.1898333 C0.532666667,41.72425 5.26791667,46.4673333 13.8101667,46.859 C16.3187917,46.9725833 17.1177917,47 23.5,47 C29.8822083,47 30.6831667,46.9725833 33.1898333,46.859 C41.7164167,46.4673333 46.47125,41.7320833 46.8570417,33.1898333 C46.9725833,30.6831667 47,29.8822083 47,23.5 C47,17.1177917 46.9725833,16.3187917 46.859,13.812125 C46.4751667,5.28554167 41.7340417,0.534625 33.1917917,0.142958333 C30.6831667,0.0274166667 29.8822083,0 23.5,0 L23.5,9.51206706e-16 Z M23.5,11.43275 C16.8357917,11.43275 11.43275,16.8357917 11.43275,23.5 C11.43275,30.1642083 16.8357917,35.5692083 23.5,35.5692083 C30.1642083,35.5692083 35.56725,30.1661667 35.56725,23.5 C35.56725,16.8357917 30.1642083,11.43275 23.5,11.43275 L23.5,11.43275 Z M23.5,31.3333333 C19.1740417,31.3333333 15.6666667,27.8279167 15.6666667,23.5 C15.6666667,19.1740417 19.1740417,15.6666667 23.5,15.6666667 C27.8259583,15.6666667 31.3333333,19.1740417 31.3333333,23.5 C31.3333333,27.8279167 27.8259583,31.3333333 23.5,31.3333333 L23.5,31.3333333 Z M36.0450833,8.136875 C34.48625,8.136875 33.223125,9.4 33.223125,10.956875 C33.223125,12.51375 34.48625,13.776875 36.0450833,13.776875 C37.6019583,13.776875 38.863125,12.51375 38.863125,10.956875 C38.863125,9.4 37.6019583,8.136875 36.0450833,8.136875 L36.0450833,8.136875 Z" id="Shape"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
            </div>

            <footer class="sport__footer">

                <h3>Blijf op de hoogte</h3>

                <form action="http://metatalk.createsend.com/t/r/s/kltujjr/" method="post" id="subForm">
                    <p>Schrijf je in op onze nieuwsbrief.</p>

                    <input class="subscribe-newsletter" id="fieldEmail" name="cm-kltujjr-kltujjr" type="email" placeholder="Je e-mail adres" required>
                    <input id="fieldtlhldkld" name="cm-f-tlhldkld" type="hidden" value="<?php echo $post->post_name; ?>">

                    <button class="btn btn--smaller" type="submit">Inschrijven</button>

                </form>
            </footer>
        </div>

        <?php
          if(is_user_logged_in()) {
            get_template_part('templates/form-dialog-test');
          } else {
            get_template_part('templates/form-dialog');
          }
         ?>

    </article>
<?php endwhile; ?>
