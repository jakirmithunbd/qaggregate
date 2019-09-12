<?php get_header(); ?>
<div id="primary" class="content-area error-404">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<section class="not-found text-center">
					<header class="page-header">
						<h1 class="hero"><?php _e('404', 'vexp'); ?></h1>
						<h3 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'vexp' ); ?></h3>
					</header><!-- .page-header -->

					<div class="page-content">
						<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'vexp' ); ?></p>

						<a class="btn" href="<?php echo esc_url( site_url() ); ?>"><?php _e('Back To Homepage', 'vexp'); ?></a>

					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div>
		</div>
	</div>
</div><!-- #primary -->
<?php get_footer(); ?>