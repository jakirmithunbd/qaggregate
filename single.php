<?php get_header(); ?>
<!-- begin Banner -->
<?php if(is_singular( 'post' ) ) {
    $page_id = get_option('page_for_posts');
        $page_header_content = get_field( 'page_header_content', $page_id);
        $bg = $page_header_content['bg_image'] ? $page_header_content['bg_image'] : get_theme_file_uri( '/assets/images/1920X255.jpg' );
    } ?>
<section class="page-banner align-center" style="background-image: url('<?php echo $bg; ?>');">
    <div class="container">
        <div class="banner-content">
            <h1><?php _e('Our Short Blog', 'vexp'); ?></h1>
        </div>
    </div>
</section><!--  /end of Banner -->

<div class="blog-single-post">
    <div class="container">
        <div class="row">
            <?php $active = is_active_sidebar('sidebar-1') ? 'col-md-8 col-sm-8 col-xs-12' : 'col-xs-12'; ?>
            <div class="<?php echo $active; ?>">
                <div class="default-editor">
                    <h3><?php the_title(); ?></h3>
                    <?php if(has_post_thumbnail()){
                        the_post_thumbnail( null, array('class' => 'img-responsive') );
                    } ?>
                    <?php if (have_posts()): ?>
                        <?php while(have_posts()) : the_post() ; ?>
                        <ul class="post-info list-unstyle">
                            <?php 
                                $terms_string = join(', ', wp_list_pluck(get_the_category(), 'name')); 
                            ?>
                            <li><span class="fas fa-folder"></span><p><?php echo $terms_string; ?></p></li>
                            <li><span class="fas fa-user"></span><p>by <?php the_author(); ?></p></li>
                            <li><span class="fas fa-calendar-alt"></span><p><?php echo get_the_date(); ?></p></li>
                            <li><?php echo do_shortcode('[rating]'); ?></li>
                        </ul>

                        <?php the_content(); ?>
                        
                    <?php endwhile; endif; ?>
                </div>

                <div class="return-blog-page">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php $page_id = get_option('page_for_posts'); $blog_page = get_the_permalink( $page_id ); ?>
                            <a class="text-uppercase return-page" href="<?php echo $blog_page; ?>"><span class="fas fa-arrow-left"></span><?php _e('Back To Blog Page', 'vexp'); ?></a>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-share">
                                <?php echo sharethis_inline_buttons(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- Single col-8 -->

            <div class="col-md-3 col-md-offset-1 col-sm-4 col-xs-12">
                <div class="sidebar">
                    <?php if (is_active_sidebar( 'sidebar-1' )) {
                        dynamic_sidebar( 'sidebar-1' );
                    } ?>
                </div>
            </div><!-- Single sidebar col -->
        </div>

        <div class="related-post">
            <div class="related-title">
                <h6><?php _e('Related Post', 'vexp'); ?></h6>
            </div>

            <div class="row eq-height">
                <?php 
                // Blog related post

                    $post_id = get_the_ID();
                    $cat_ids = array();
                    $categories = get_the_category( $post_id );

                    if(!empty($categories)):
                        foreach ($categories as $category):
                            array_push($cat_ids, $category->term_id);
                        endforeach;
                    endif;

                    $query_args = array( 
                        'category__in'   => $cat_ids,
                        'post_type'      => 'post',
                        'post_not_in'    => array($post_id),
                        'posts_per_page'  => 3
                    );

                    $related_cats_post = new WP_Query( $query_args );

                    if($related_cats_post->have_posts()):
                         while($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
                            <div class="col-sm-4 col-xs-6 col">
                                <div class="post">
                                    <div class="media">
                                        <?php if (has_post_thumbnail()): ?>
                                            <?php the_post_thumbnail('post_img', array('class'=>'img-responsive')); ?>
                                        <?php endif ?>

                                        <a href="<?php the_permalink(); ?>" class="hover">
                                            <span class="fas fa-link"></span>
                                        </a>
                                    </div>
                                    
                                    <div class="post-meta">
                                        <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        <span class="d-border"></span>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div><!-- / post col --> 
                        <?php endwhile; wp_reset_postdata();
                    endif;
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>