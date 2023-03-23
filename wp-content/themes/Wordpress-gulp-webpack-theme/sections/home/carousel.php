<?php 
$settings = get_theme_mod( 'carousel_list_setting', $defaults );
if($settings && is_array($settings)):
?>
<div class="carousel section">
    <div class="carousel__container">
        <?php foreach( $settings as $setting ) : ?>
        <div class="carousel__item">
            <?php
                if($setting['type_option'] == 'video'):
            ?>
            <div class="video__item">
                <video src="<?php echo wp_get_attachment_url($setting['carousel_image']) ?>" preload="metadata" loop
                    autoplay></video>
            </div>
            <?php 
                endif; 
            ?>
            <?php
                if($setting['type_option'] == 'image'):
                    $url = wp_get_attachment_url($setting['carousel_image']);
                    $alt = clean_special_character_from_string(get_the_title($setting['carousel_image']));
            ?>
            <picture>
                <source srcset="<?php echo get_image_crop_url($url,375,256.34 ) ?>" media="(max-width: 375px)">
                <source srcset="<?php echo get_image_crop_url($url,414,238 ) ?>" media="(max-width: 414px)">
                <source srcset="<?php echo get_image_crop_url($url,768,525 ) ?>" media="(max-width: 768px)">
                <source srcset="<?php echo get_image_crop_url($url,1024,700 ) ?>" media="(max-width: 1024px)">
                <source srcset="<?php echo get_image_crop_url($url,1280,850 ) ?>" media="(max-width: 1063px)">
                <source srcset="<?php echo get_image_crop_url($url,1280,700 ) ?>" media="(max-width: 1336px)">
                <source srcset="<?php echo get_image_crop_url($url,1366,700 ) ?>" media="(max-width: 1336px)">
                <source srcset="<?php echo get_image_crop_url($url,1366,700 ) ?>" media="(max-width: 1336px)">
                <source srcset="<?php echo get_image_crop_url($url,1440,700 ) ?>" media="(max-width: 1440px)">
                <source srcset="<?php echo $url  ?>" media="(min-width: 1920px)">
                <img src="<?php echo $url ?>" alt="<?php echo $alt ?>" />
            </picture>
            <?php 
                endif; 
            ?>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="carousel__menu">
        <div class="carousel__menu-container container">
            <?php
                wp_nav_menu(array(
                'theme_location' => 'carousel_nav' ));
            ?>
        </div>
    </div>
</div>
<?php endif; ?>