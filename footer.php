    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-6 col">
                    <h5><?php _e( 'Products', 'infer' ); ?></h5>
                     <?php 
                        if ( function_exists( 'wp_nav_menu' ) ) {
                            wp_nav_menu( 
                                array(
                                    'menu'               => 'Footer 1st Menu',
                                    'theme_location'     => 'menu-2',
                                    'depth'              => 2,
                                    'container'          => 'false',
                                    'menu_class'         => 'nav navbar-nav',
                                    'menu_id'            => '',
                                    'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                    'walker'             => new wp_bootstrap_navwalker()
                                ) 
                            ); 
                        } 
                    ?>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6 col">
                    <h5><?php _e( 'Company', 'infer' ); ?></h5>
                    <?php 
                        if ( function_exists( 'wp_nav_menu' ) ) {
                            wp_nav_menu( 
                                array(
                                    'menu'               => 'Footer 2nd Menu',
                                    'theme_location'     => 'menu-3',
                                    'depth'              => 2,
                                    'container'          => 'false',
                                    'menu_class'         => 'nav navbar-nav',
                                    'menu_id'            => '',
                                    'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                    'walker'             => new wp_bootstrap_navwalker()
                                ) 
                            ); 
                        } 
                    ?>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6 col">
                    <h5><?php _e( 'Developers', 'infer' ); ?></h5>
                    <?php 
                        if ( function_exists( 'wp_nav_menu' ) ) {
                            wp_nav_menu( 
                                array(
                                    'menu'               => 'Footer 3rd Menu',
                                    'theme_location'     => 'menu-4',
                                    'depth'              => 2,
                                    'container'          => 'false',
                                    'menu_class'         => 'nav navbar-nav',
                                    'menu_id'            => '',
                                    'fallback_cb'        => 'wp_bootstrap_navwalker::fallback',
                                    'walker'             => new wp_bootstrap_navwalker()
                                ) 
                            ); 
                        } 
                    ?>
                </div>

                <?php $socials = get_field('social_media', 'options'); ?>
                <div class="col-md-6 col-sm-3 col-xs-6 col text-right">
                    <h5><?php _e('Get in Touch', 'infer'); ?></h5>
                    <div class="social-media">
                        <?php foreach ($socials as $social): ?>
                            <a href="<?php echo $social['url']; ?>"><span class="fa fa-<?php echo $social['icon']['value'] ?>"></span></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <?php $footer = get_field('copy_right', 'options'); if($footer) : ?>
            <div class="copyright">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <p><?php echo $footer; ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        </div>
    </footer>
    <?php wp_footer(); ?>
    </body>
</html>