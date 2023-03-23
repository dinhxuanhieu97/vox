<?php
/**
 * template name: Contact
 */
get_header('home'); 
?>
<section class="main-page contact-page-template" id="page-<?php the_ID() ?>">
    <div class="contact-page__container container">
        <div class="contact-page__title">
            <h1>
                TELL US YOUR DAMN JOB?
            </h1>
        </div>
        <div class="contact-page__contain">
            <div class="contact-page__divide">
                <div class="contact-page__big">
                    <div class="contact-page__big-item">
                        <label class="label" for="contactName">What is your name?</label>
                        <input type="text" name="contactName" autocomplete="off" placeholder="Enter your name here" id="contactName">
                        <p class="show-error" style="color:#ea5857; font-size: 14px;"></p>
                    </div>
                    <div class="contact-page__big-item">
                        <label class="label" for="contactEmail">What is your email?</label>
                        <input type="text" name="contactEmail" autocomplete="off" placeholder="Enter your email here" id="contactEmail">
                        <p class="show-error" style="color:#ea5857; font-size: 14px;"></p>
                    </div>
                    <div class="contact-page__big-item">
                        <label class="label" for="contactTelephone">What is your telephone?</label>
                        <input type="text" name="contactTelephone" autocomplete="off" placeholder="Enter your telephone here"
                            id="contactTelephone">
                        <p class="show-error" style="color:#ea5857; font-size: 14px;"></p>
                    </div>
                    <div class="contact-page__big-item">
                        <label class="label" for="contactBudget">How much your budget?</label>
                        <input type="text" name="contactBudget" autocomplete="off" placeholder="Type here" id="contactBudget">
                        <p class="show-error" style="color:#ea5857; font-size: 14px;"></p>
                    </div>
                    <div class="contact-page__big-item">
                        <div class="label">
                            What is your inquiry about?
                        </div>
                        <div class="contact-page__big-item-contain">
                            <div class="contact-page__big-item-contain-checkbox">
                                Design
                            </div>
                            <div class="contact-page__big-item-contain-checkbox">
                                Website
                            </div>
                            <div class="contact-page__big-item-contain-checkbox">
                                Content
                            </div>
                            <div class="contact-page__big-item-contain-checkbox">
                                Strategy
                            </div>
                            <div class="contact-page__big-item-contain-checkbox">
                                Event
                            </div>
                            <div class="contact-page__big-item-contain-checkbox">
                                Visual
                            </div>
                        </div>
                        <p class="show-error" style="color:#ea5857; font-size: 12px;"></p>
                    </div>
                    <div class="contact-page__big-item">
                        <div class="contact-page__big-item-submit">
                            <div class="btn">
                                SUBMIT
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-page__small">
                    <div class="contact-page__small-top">
                        <div class="contact-page__small-top-title">
                            <h2>
                                EMAIL US
                            </h2>
                        </div>
                        <div class="contact-page__small-top-content">
                            <a href="mailto:<?php echo get_theme_mod('general_email_text'); ?>"><?php echo get_theme_mod('general_email_text'); ?></a>
                        </div>
                    </div>
                    <div class="contact-page__small-divide"></div>
                    <div class="contact-page__small-bottom">
                        <div class="contact-page__small-bottom-title">
                            <h2>
                                Subscribe us
                            </h2>
                        </div>
                        <div class="contact-page__small-bottom-content">
                            <a href="<?php echo get_theme_mod('general_fb_link_text','https://facebook.com/') ?>"
                                class="contact-page__small-bottom-social" rel="noopener noreferrer" target="_blank">
                                <span class="dashicons dashicons-facebook-alt"></span>
                            </a>
                            <a href="<?php echo get_theme_mod('general_insta_link_text','https://instagram.com/') ?>"
                                class="contact-page__small-bottom-social" rel="noopener noreferrer" target="_blank">
                                <span class="dashicons dashicons-instagram"></span>
                            </a>
                            <a href="<?php echo get_theme_mod('general_pinterest_link_text','https://pinterest.com/') ?>"
                                class="contact-page__small-bottom-social" rel="noopener noreferrer" target="_blank">
                                <span class="dashicons dashicons-pinterest"></span>
                            </a>
                            <a href="<?php echo get_theme_mod('general_twitter_link_text','https://twitter.com/') ?>"
                                class="contact-page__small-bottom-social" rel="noopener noreferrer" target="_blank">
                                <span class="dashicons dashicons-twitter"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer('home');
?>