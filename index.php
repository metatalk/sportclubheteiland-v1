
<?php
$sports = get_posts(array(
    'post_type' => 'sport',
    'posts_per_page' => 10,
    'orderby' => 'menu_order',
    'order' => 'ASC'
));
?>

<div class="home-header">

    <div class="home-header__bg">
        <div class="home-header__cta">
            <img class="home-header__logo" src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-heteiland-full.svg" alt="Sportclub Het Eiland">
            <a data-dialog="cta" class="button button--inverse">Vraag een gratis dagpas aan</a>
        </div>
    </div>
    <div class="home-header___sports-logos">
        <?php foreach($sports as $sport): ?>
          <?php if($sport->post_name != 'running' && $sport->post_name != 'impact'): ?>
            <a href="<?php echo get_permalink($sport->ID); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-<?php echo $sport->post_name; ?>-eiland-black.svg" alt="<?php echo $sport->post_title; ?>">
            </a>
          <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="down down--black">
        <a href="#" class="down__arrow">
            <svg width="16px" height="9px" viewBox="0 0 16 9" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
                    <polyline id="Line" class="down__arrow-svg" stroke-width="2" points="1 1 8 8 15 1"></polyline>
                </g>
            </svg>
        </a>
    </div>
</div>

<div class="home-sports__header">
    <h1>This is what we do.</h1>
    <p class="lead">
        Sportclub Het Eiland telt niet minder dan 7 sportconcepten. Met deze verschillende sportconcepten onder één dak, mogen wij ons met veel trots de grootste club binnen Antwerpen- Centrum noemen.
    </p>
</div>

<div class="content-grid__row content-grid__row--reverse content-grid__row--sport">

    <?php foreach($sports as $sport): ?>

        <?php $bg = get_field('achtergrond',$sport->ID); ?>

            <a href="<?php echo get_permalink($sport->ID); ?>" class="content-grid__block content-grid__block--<?php echo $sport->post_name; ?> content-grid__block--overlay">
                <div class="home__sport-bg" style="background-image: url(<?php echo $bg['sizes']['large']; ?>);"></div>
                <div class="content-grid__content">
                    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo-<?php echo $sport->post_name; ?>-eiland.svg" alt="Ontdek <?php echo $sport->post_title; ?> het Eiland">
                </div>
            </a>

    <?php endforeach; ?>
</div>

<p style="padding: 20px; text-align: center;">
<a data-dialog="cta" class="button button--black">Vraag een gratis dagpas aan</a>
</p>

<?php get_template_part('templates/form-dialog'); ?>

<?php get_template_part('templates/footer'); ?>
