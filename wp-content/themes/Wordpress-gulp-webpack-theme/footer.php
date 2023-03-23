    <section class="footer">
        <div class="footer__main">
            <div class="footer__main-container footer__child container">
                <div class="footer__child-list">
                    <div class="footer__main-item footer__child-logo col-divide-4 col-divide-lg-12">
                        <a href="<?php echo home_url(); ?>" class="d--block logo mr-auto">
                            <img src="<?php echo get_theme_mod('custom_logo_footer_child_page') ?>"
                                alt="<?php echo clean_special_character_from_string(bloginfo('name')) ?>">
                        </a>
                    </div>
                    <div class="footer__main-item footer__child-info col-divide-8 col-divide-lg-12">
                        <div class="row-divide">
                            <div class="col-divide-6 col-divide-sm-12 col-contact">
                                <div class="title-label">
                                    <h1 class="label-item">
                                        contact
                                    </h1>
                                    <div class="btn-request">
                                        <button class="btn btn-request-submit">
                                            <a
                                                href="<?php echo get_the_permalink(get_theme_mod('url_contact_setting')) ? get_the_permalink(get_theme_mod('url_contact_setting')) : 'javascript:void(0)' ?>">REQUEST
                                                A QUOTE</a>
                                        </button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-divide-6 col-divide-sm-12 col-info">
                                <?php if (get_theme_mod('general_email_text')): ?>
                                <div class="footer__main-info-content-item">
                                    <?php echo get_theme_mod('general_email_text'); ?>
                                </div>
                                <?php endif;?>
                                <?php if (get_theme_mod('footer_home_title_text')): ?>
                                <?php endif;?>
                                <div class="footer__main-info-content">
                                    <?php if (get_theme_mod('general_phone_text')): ?>
                                    <div class="footer__main-info-content-item">
                                        <?php echo get_theme_mod('general_phone_text'); ?>
                                    </div>
                                    <?php endif;?>
                                    <?php if (get_theme_mod('general_address_text')): ?>
                                    <div class="footer__main-info-content-item">
                                        <?php echo get_theme_mod('general_address_text'); ?>
                                    </div>
                                    <?php endif;?>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php 
		get_template_part('sections/hambuger')
		?>
    </section>
    <?php wp_footer();?>
    </body>

    </html>