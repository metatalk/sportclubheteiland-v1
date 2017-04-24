<div id="cta" class="dialog">
    <div class="dialog__overlay"></div>
    <div class="dialog__content dialog__animate">
        <div class="dialog__info">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/images/icon-heteiland.svg" style="width: 50px; margin: 0 0 20px 0; display: block;" alt="">
            <?php
                $title = get_field('action_title');
                if(empty($title)) {
                    $title = 'Gratis dagpas aanvragen';
                }
            ?>
            <h2><?php echo $title; ?></h2>
            <?php the_field('action_description'); ?>
        </div>
        <div class="dialog__form" style="padding:0;height:600px;">
          <iframe src="https://cloud3.clubplanner.be/Heteiland/registration?menu=0" width="100%" height="100%" style="border:none;"></iframe>
          <a class="dialog__close" data-dialog-close>×</a>
        </div>
    </div>
</div>
