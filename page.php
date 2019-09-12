<?php get_header(); 
$page_id = get_queried_object()->ID;
?>

<?php 
$bg = get_the_post_thumbnail_url($page_id) ? get_the_post_thumbnail_url($page_id) : get_theme_file_uri( '/assets/images/1920X350.png' );
?>
<!-- begin banner -->
<section class="page-banner" style="background-image: url('<?php echo $bg; ?>');">
    <div class="container">
        <p class="banner-title"><?php echo get_the_title($page_id); ?></p>
    </div>
</section><!--  /end of banner -->

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="main-content">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>