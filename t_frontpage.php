<?php 
/*
Template Name: Home
*/ 
get_header(); ?>
<?php $banner = get_field('home_banner'); ?>
<section class="banner align-center" style="background: <?php echo $banner['bg_color']; ?>">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="banner-content">
                    <?php if ( $banner['title']): ?>
                    <h5 class="wow fadeInUp"><?php echo $banner['title']; ?></h5>
                    <?php endif; ?>

                    <?php if ($banner['subtitle']): ?>
                    <h1 class="wow fadeInUp"><?php echo $banner['subtitle']; ?></h1>
                    <?php endif; ?>

                    <?php if ($banner['descriptions']): ?>
                    <h4 class="wow fadeInUp"><?php echo $banner['descriptions']; ?></h4>
                    <?php endif; ?>

                    <?php if ($banner['button']): ?>
                    <a class="btn wow fadeInUp" href="<?php echo $banner['button']['link']; ?>"><?php echo $banner['button']['text']; ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div><!-- / Banner Container -->
</section><!-- / Banner  -->

<?php $intro = get_field('intro_screenshot'); array_filter($intro); ?>
<div class="screenshot">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="media wow fadeInUp" data-wow-delay=".5s">
                    <img src="<?php echo $intro['url']; ?>" class="img-responsive" alt="<?php echo $intro['name']; ?>">
                </div>
            </div>
        </div>
    </div>
</div>

<?php $uncover_opportunities = get_field('uncover_opportunities'); array_filter($uncover_opportunities); ?>
<section class="services">
    <div class="container">

        <?php $counter = 1; foreach ($uncover_opportunities as $item): array_filter($item); 
            $class = $counter % 2 == 1 ? '' : 'reverse';
        ?>
        <div class="row align-center <?php echo $class; ?>">
            <div class="col-md-6">
                <div class="main-content wow fadeInUp">
                    <?php echo $item['content']; ?>
                </div>
            </div>
            <div class="col-md-6">
                <?php if ($item['image']): ?>
                <div class="media wow fadeInUp" data-wow-delay=".2s">
                    <img src="<?php echo $item['image']['url']; ?>" class="img-responsive" alt="">
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php $counter++; endforeach; ?>

    </div>
</section>

<?php $works = get_field('how_work'); array_filter($works); $sliders = $works['sliders']; ?>
<section class="how-works">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ($works['title']): ?>
                <div class="title wow fadeInUp">
                    <h2><?php echo $works['title']; ?></h2>
                </div>
                <?php endif; ?>

                <div class="how-works-slider">
                    <div class="slick-slider-img wow fadeInUp">
                        <?php foreach ($sliders as $slider): ?>
                        <div class="slider-image">
                            <img src="<?php echo $slider['image']['url']; ?>" class="img-responsive" alt="<?php echo $slider['image']['name']; ?>">
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="slick-slider-content wow fadeInUp">
                        <?php foreach ($sliders as $slider): ?>
                        <div class="slick-slider-item">
                            <?php if ($slider['title']): ?>
                            <h4><?php echo $slider['title']; ?></h4>
                            <?php endif; ?>

                            <?php if ($slider['subtitle']): ?>
                            <p><?php echo $slider['subtitle']; ?></p>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $technology = get_field('technology'); array_filter($technology); ?>
<section class="services technology">
    <div class="container">
        <?php $c = 1; foreach ($technology as $items): 
        $cc = $c % 2 == 1 ? '' : 'reverse';
        ?>
        <div class="row align-center <?php echo $cc; ?>">
            <div class="col-md-6">
                <div class="main-content wow fadeInUp">
                    <?php echo $items['tech_content']; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="media wow fadeInUp">
                    <img src="<?php echo $items['tech_image']['url']; ?>" class="img-responsive" alt="<?php echo $items['tech_image']['url']; ?>">
                </div>
            </div>
        </div>
        <?php $c++; endforeach; ?>
    </div>
</section>

<?php $clients_content = get_field('clients_content'); array_filter($clients_content); ?>
<section class="companies">
    <div class="container">
        <div class="row">
            <?php if ($clients_content['title']): ?>
            <div class="col-md-12 wow fadeInUp">
                <div class="title"><?php echo $clients_content['title']; ?></div>
            </div>
            <?php endif; ?>
        </div>
        <div class="eq-height wow fadeInUp">
            <?php foreach ( $clients_content['companies'] as $client ): ?>
            <div class="company">
                <img src="<?php echo $client['image']['url']; ?>" class="img-responsive" alt="">
                <p><?php echo $client['descriptions']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php $triagecontent = get_field('triage_made_simple_content'); array_filter($triagecontent); ?>
<section class="services">
    <div class="container">
        <?php $count = 1; foreach ($triagecontent as $triage): 
        $tc = $count % 2 == 1 ? '' : 'reverse';
        ?>
        <div class="row align-center <?php echo $tc; ?>">
            <div class="col-md-6">
                <div class="main-content wow fadeInUp">
                    <?php echo $triage['triage_content']; ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="media wow fadeInUp">
                    <img src="<?php echo $triage['image']['url']; ?>" class="img-responsive" alt="<?php echo $triage['image']['name']; ?>">
                </div>
            </div>
        </div>
        <?php $count++; endforeach; ?>
    </div>
</section>

<?php $theres_even_more = get_field('theres_even_more'); ?>
<section class="more-serviecs">
    <div class="container">
        <div class="row">
            <div class="col-md-12 wow fadeInUp">
                <div class="title"><?php the_field('theres_even_more_title'); ?></div>
            </div>

            <?php foreach ( $theres_even_more as $more_title ): ?>
            <div class="col-md-6 wow fadeInUp">
                <div class="icon">
                    <img src="<?php echo $more_title['icon']['url']; ?>" class="img-responsive" alt="<?php echo $more_title['icon']['url']; ?>">
                </div>
                <div class="more-service">
                    <h4><?php echo $more_title['title']; ?></h4>
                    <?php echo $more_title['descriptions']; ?>
                </div>
            </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</section>

<?php $contact_us = get_field('contact_us'); ?>
<section class="contact-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center wow fadeInUp">
                <?php if ($contact_us['title']): ?>
                <h3><?php echo $contact_us['title']; ?></h3>
                <?php endif; ?>

                <?php if ($contact_us['description']): ?>
                <p><?php echo $contact_us['description']; ?></p>
                <?php endif; ?>

                <div class="contact-form">
                <?php echo do_shortcode( '[gravityform id=1 title=false description=false ajax=true tabindex=49] ' ); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>