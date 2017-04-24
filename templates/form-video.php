<div id="youtube" class="dialog dialog--video">
    <div class="dialog__overlay"></div>
    <div class="dialog__content dialog__animate">

        <div class="videoWrapper">
          <?php echo wp_oembed_get(get_field('youtube_url')); ?>
        </div>

        <a class="dialog__close" data-dialog-close>×</a>

    </div>
</div>
