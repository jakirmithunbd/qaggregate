<?php get_header(); 

get_queried_object();
?>
<?php echo get_template_part( '/template-parts/vexp_page_header' ); ?>

<!-- begin blog-list -->
<section class="blog-list">
    <div class="container">
        <div class="row eq-height" id="blog_post">
        
        </div><!-- / post row -->

        <div class="row">
            <div class="col-md-12 text-center">
                <button class="post-load-more" id="post_load_more"><?php _e('Load More', 'vexp'); ?></button>
            </div>
        </div>
    </div>
</section><!--  /end of blog-list -->
<?php get_footer(); ?>