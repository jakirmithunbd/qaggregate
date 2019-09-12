<?php 
/*
	Template Name: Blog
*/
get_queried_object();
$page_id = get_queried_object()->ID;
get_header(); ?>
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
        		<div class="blog-list">
		        	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		            <div class="post row align-center">
		            	<div class="col-md-4 col-sm-6 col-xs-12">
			                <a href="<?php the_permalink(); ?>" class="media">
			                    <?php if (has_post_thumbnail()) {
			                    	echo the_post_thumbnail(null, array('class' => 'img-responsive'));
			                    } ?>
			                </a><!-- / post media -->
		                </div>
						
						<div class="col-md-8 col-sm-6 col-xs-12">
			                <div class="post-content">
			                    <a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			                    <?php the_excerpt(); ?>
			                    <a class="read-more" href="<?php the_permalink(); ?>"><?php _e('more', 'infer'); ?></a>
			                </div><!-- / post content -->
		                </div>
		            </div><!-- / post item -->
					<?php endwhile; endif; wp_reset_postdata(); ?>

		            <?php the_posts_pagination( array(
		                'screen_reader_text' => ' ',
		                'prev_text' => __( '<', 'infer' ),
		                'next_text' => __( '>', 'infer' ),
		            ) ); ?>
		        </div><!-- / blog list -->
        	</div>
        </div>
	</div>
</section>
<?php get_footer(); ?>