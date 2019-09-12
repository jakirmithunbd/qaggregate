<?php get_header(); ?>

<?php echo get_template_part( '/template-parts/vexp_page_header' ); ?>

<?php if(is_cart()): ?>
<section class="order-details-wrapper">
    <div class="container">
        <!-- MultiStep-bar -->
        <ul class="mstep-bar">
            <li class="active"><?php printf('<span>%s</span>%s', esc_html__('1', 'vexp'), esc_html__( 'Order Details', 'vexp' )); ?></li>
            <li><?php printf('<span>%s</span>%s', esc_html__('2', 'vexp'), esc_html__( 'Confirm & Pay', 'vexp' )); ?></li>
            <li><?php printf('<span>%s</span>%s', esc_html__('3', 'vexp'), esc_html__( 'Submit Requirements', 'vexp' )); ?></li>
        </ul>

        <div class="order-details">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <?php while(have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="summery-wrapper">
                        <div class="summery-table">
                            
                            <div class="summery">
                            <?php
                                /**
                                 * Cart collaterals hook.
                                 *
                                 * @hooked woocommerce_cross_sell_display
                                 * @hooked woocommerce_cart_totals - 10
                                 */
                                do_action( 'woocommerce_cart_collaterals' );
                            ?>
                            </div>

                            <div class="pament-card text-center">
                                <span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/paypal.png" alt=""></span>
                                <span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/mastercard.png" alt=""></span>
                                <span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/visa.png" alt=""></span>
                                <span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/discover.png" alt=""></span>
                                <span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/amex.png" alt=""></span>
                                <span><img src="<?php echo get_theme_file_uri(); ?>/assets/images/diner's club.png" alt=""></span>
                            </div>

                        </div>
                    </div><!-- / Summery -->
                </div><!-- / Summery Col -->
            </div><!-- / order details row -->
        </div><!-- / order details -->
    </div>
</section><!--  /end of order details -->
<?php elseif(is_checkout()): ?>

<section class="order-details-wrapper">
    <div class="container">
        <!-- MultiStep-bar -->
        <ul class="mstep-bar">
            <li><?php printf('<span>%s</span>%s', esc_html__('1', 'vexp'), esc_html__( 'Order Details', 'vexp' )); ?></li>
            <li class="<?php echo (is_checkout() && empty( $wp->query_vars['order-received'] )) ? 'active' : ''; ?>"><?php printf('<span>%s</span>%s', esc_html__('2', 'vexp'), esc_html__( 'Confirm & Pay', 'vexp' )); ?></li>
            <li class="<?php echo (is_checkout() && !empty( $wp->query_vars['order-received'] )) ? 'active' : ''; ?>"><?php printf('<span>%s</span>%s', esc_html__('3', 'vexp'), esc_html__( 'Submit Requirements', 'vexp' )); ?></li>
        </ul>

        <div class="order-details">
            <?php while(have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile; wp_reset_postdata(); ?>
        </div><!-- / order details -->
    </div>
</section><!--  /end of order details -->

<?php elseif(is_account_page() && is_user_logged_in()): ?>
    <!-- begin user dashboard -->
    <div class="user-dashboard">
        
        <div class="container">
            <!-- begin dashboard wrapper -->
            <div class="dashboard-wrapper">
                
                <!-- begin sidebar -->
                <div class="sidebar">
                    <div id="dashboard-sidr" class="navigation dashboard-menu">
                        <div class="dashboard-head">
                            <div class="active-logo">
                            <?php 
                                $current_user = wp_get_current_user(); 
                                // online function is ready to use
                                ?>

                                <span class="logo"><img src="<?php echo esc_url( get_avatar_url( $current_user->ID ) ); ?>" alt="<?php echo join(' ', [$current_user->user_firstname, $current_user->user_lastname]); ?>"></span>
                                
                                <div class="user-meta">
                                    <p><?php echo $current_user->display_name; ?></p>
                                    <?php
                                    printf(__('<a href="%1s">Logout</a>', 'vexp'), esc_url( wc_logout_url( wc_get_page_permalink( 'myaccount' ))));
                                    ?>
                                </div>
                            </div>

                            <!-- begin panel header -->
                            <div class="panel-header visible-xs">
                                <?php vexplainer_my_account_title(); ?>
                            </div> <!-- /end of panel header -->
                        </div>

                        <ul class="details-menu hidden-xs">
                            <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                                <li class="<?php echo wc_get_account_menu_item_classes( $endpoint ); ?>">
                                    <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php vexplainerDashIcons($endpoint); ?><?php echo esc_html( $label ); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div> <!-- /end of sidebar -->
            
                <!-- begin main panel -->
                <div class="main-panel">

                    <!-- begin panel header -->
                    <div class="panel-header hidden-xs">
                        <?php vexplainer_my_account_title(); ?>
                    </div> <!-- /end of panel header -->

                    <div class="mobile-select">
                        <select class="form-control visible-xs" name="" id="mobile-dashboard-menu">
                            <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) :
                                //$seleted = $endpoint == strtolower($label) ? 'selected' : '';
                            ?>
                            <?php printf('<option value="%s" %s >%s</option>', esc_url( wc_get_account_endpoint_url( $endpoint ) ), $seleted, esc_html( $label ) ) ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <!-- begin main content -->
                    <div class="main-content">

                <?php
                    /**
                     * My Account content.
                     *
                     * @since 2.6.0
                     */
                    do_action( 'woocommerce_account_content' );
                ?>
                        
                    </div> <!-- /end of main content -->

                    
                </div> <!-- /end of main panel -->


            </div> <!-- /end of dashboard wrapper -->
            
        </div>
    </div> <!-- /end of user dahboard -->

<?php else: ?>
<section class="vexp-page">
    <div class="container">
        <div class="row">
        	<?php while(have_posts()) : the_post(); ?>
            <div class="col-sm-12">
                <div class="page-details">
                    <?php $thumb = get_the_post_thumbnail_url(); ?>
                    <div class="media">
                        <img src="<?php echo $thumb; ?>" class="img-responsive" alt="">
                    </div>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div><!-- / col-8  -->
			<?php endwhile; wp_reset_postdata(); ?>
        </div><!-- /blog-single Row -->
    </div><!-- /blog-single Container -->
</section><!-- /blog-single -->
<?php endif; ?>

<?php get_footer(); ?>