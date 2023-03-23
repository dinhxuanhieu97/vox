<div class="client section">
    <div class="client__container">
        <div class="client__contain-main">
            <div class="client__contain-main-decore">
                Give us
            </div>
            <div class="client__title">
                <h3>
                    <?php echo get_theme_mod('client_home_title_text'); ?>
                </h3>
            </div>
            <div class="client__contain container">
                <?php 
                    $settings = get_theme_mod( 'client_list_setting', $defaults );
                    if($settings && is_array($settings)): 
                ?>
                <div class="client__list">
                    <?php foreach($settings as $client): ?>
                    <div class="client__list-item">
                        <?php 
                            $url = wp_get_attachment_url($client['image']);
                            $alt = clean_special_character_from_string(get_the_title($client['image']));
                        ?>
                        <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" />
                    </div>
                    <?php endforeach ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="client__job">
            <div class="client__job-title">
                Give us
                <span>
                    Your Damn
                </span>
            </div>
            <div class="client__job-menu">
                <div class="client__job-menu-button">
                    <img src="<?php echo home_url() ?>/dist/images/arrow-up.png" alt="arrow-button-up">
                    <span>job</span>
                </div>
            </div>
        </div>
    </div>
    <div class="client__job-menu-main">
        <?php
                    wp_nav_menu(array(
                        'theme_location' => 'job_nav' ));
                    ?>
    </div>
</div>