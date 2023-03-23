<div class="post-item-widget">
<a href="<?php echo get_permalink(get_the_ID())?>">
    <div class="post-item-container">
        <div class="post-item-feature">
            <picture>
                <source srcset="<?php the_image_crop_url(get_the_post_thumbnail_url(get_the_ID()),767,251);?>" media="(min-width: 1025px)">
                <source srcset="<?php the_image_crop_url(get_the_post_thumbnail_url(get_the_ID()),720,480);?>" media="(max-width: 1024px)">
                <source srcset="<?php the_image_crop_url(get_the_post_thumbnail_url(get_the_ID()),360,240);?>" media="(max-width: 438px)">
                <img src="<?php the_image_crop_url(get_the_post_thumbnail_url(get_the_ID()),767,251);?>" alt="img">
            </picture>
        </div>
        <div class="post-item-information">
            <div class="information-container">
            <div class="post-item-title">
               <?php the_title();?>
            </div>
            <div class="post-item-des eclips-7-row">
                <div class="des-content">
                <?php echo wp_trim_words(get_the_excerpt(),74,'');?>
                </div>
            </div>
            </div>
            
        </div>
    </div>
    </a>
</div>