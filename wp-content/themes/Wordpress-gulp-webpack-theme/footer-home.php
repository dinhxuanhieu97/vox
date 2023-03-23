<section class="footer footer--home section">
    <?php 
	$cat_ids = get_theme_mod('blog_cat_select');
	if($cat_ids && is_array($cat_ids)):
		$args = [
			'post_status' => 'published',
			'post_type'   => 'post',
			'category__in'=> $cat_ids,
            'showposts'   => 10,
		];
		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) :
	?>
    <div class="footer__blog">
        <div class="footer__blog-title">
            <?php echo get_theme_mod('blog_home_title_text') ?>
        </div>
        <div class="footer__blog-list">
            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="footer__blog-list-item">
                <div class="footer__blog-list-item-img">
                    <a href="<?php the_permalink() ?>">
                        <?php the_thumbnail_crop(460,320) ?>
                    </a>
                </div>
                <div class="footer__blog-list-item-content">
                    <h3 class="footer__blog-list-item-content-title">
                        <a href="<?php the_permalink() ?>">
                            <?php echo wp_trim_words(get_the_title(),16,'...'); ?>
                        </a>
                    </h3>
                    <p>
                        <?php echo wp_trim_words(get_the_excerpt(),20,'...'); ?>
                    </p>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php endif; wp_reset_postdata(); endif; ?>
    <div class="footer__main">
        <div class="footer__main-container container">
            <div class="footer__main-list">
                <div class="footer__main-item footer__main-logo">
                    <a href="<?php echo home_url(); ?>" class="d--block logo mr-auto">
                        <img src="<?php echo get_theme_mod( 'custom_logo_footer' ) ?>"
                            alt="<?php echo clean_special_character_from_string(bloginfo('name')) ?>">
                    </a>
                </div>
                <div class="footer__main-item footer__main-menu">
                    <?php
					wp_nav_menu(array(
						'theme_location' => 'footer_nav' ));
					?>
                </div>
                <div class="footer__main-item footer__main-info">
                    <?php if(get_theme_mod('footer_home_title_text')): ?>
                    <div class="footer__main-info-title">
                        <?php echo get_theme_mod('footer_home_title_text'); ?>
                    </div>
                    <?php endif;?>
                    <div class="footer__main-info-content">
                        <?php if(get_theme_mod('general_address_text')): ?>
                        <div class="footer__main-info-content-item">
                            <?php echo get_theme_mod('general_address_text'); ?>
                        </div>
                        <?php endif;?>
                        <?php if(get_theme_mod('general_phone_text')): ?>
                        <div class="footer__main-info-content-item">
                            <?php echo get_theme_mod('general_phone_text'); ?>
                        </div>
                        <?php endif;?>
                        <?php if(get_theme_mod('general_email_text')): ?>
                        <div class="footer__main-info-content-item">
                            <?php echo get_theme_mod('general_email_text'); ?>
                        </div>
                        <?php endif;?>
                    </div>
                    <div class="footer__main-info-social">
                        <a href="<?php echo get_theme_mod('general_fb_link_text','https://facebook.com/') ?>"
                            class="footer__main-info-info-social" rel="noopener noreferrer" target="_blank">
                            <span class="dashicons dashicons-facebook-alt"></span>
                        </a>
                        <a href="<?php echo get_theme_mod('general_insta_link_text','https://instagram.com/') ?>"
                            class="footer__main-info-info-social" rel="noopener noreferrer" target="_blank">
                            <span class="dashicons dashicons-instagram"></span>
                        </a>
                        <a href="<?php echo get_theme_mod('general_pinterest_link_text','https://pinterest.com/') ?>"
                            class="footer__main-info-info-social" rel="noopener noreferrer" target="_blank">
                            <span class="dashicons dashicons-pinterest"></span>
                        </a>
                        <a href="<?php echo get_theme_mod('general_twitter_link_text','https://twitter.com/') ?>"
                            class="footer__main-info-info-social" rel="noopener noreferrer" target="_blank">
                            <span class="dashicons dashicons-twitter"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
		get_template_part('sections/hambuger')
	?>
</section>
</section>
<?php wp_footer(); ?>
</body>

</html>