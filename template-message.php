<?php
/**
 * Template Name: Thank You
 */
?>

<article class="message">
    <div class="message__inner">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-heteiland-black.svg">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('templates/content', 'page'); ?>
        <?php endwhile; ?>
    </div>
</article>

<!-- Google Code for Formulier dagpas Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 867280920;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "X5JjCNuds2wQmNDGnQM";
    var google_remarketing_only = false;
    /* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/867280920/?label=X5JjCNuds2wQmNDGnQM&amp;guid=ON&amp;script=0"/>
    </div>
</noscript>
