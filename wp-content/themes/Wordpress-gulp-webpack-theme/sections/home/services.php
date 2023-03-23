<?php 
$settings = get_theme_mod('services_list_settin');
if($settings && is_array($settings )):
?>
<div class="services section">
    <div class="services__title">
        <div class="services__title-container">
            <h3>
                <?php echo get_theme_mod('services_home_title_text') ?>
            </h3>
        </div>
    </div>
    <div class="services__list">
        <?php if(!wp_is_mobile()): ?>
        <div class="services__list-contain">
            <?php foreach($settings as $set): ?>
            <div class="service__list-item">
                <div class="service__list-item-img">
                    <a href="<?php echo get_page_link((int)$set['link']) ?>">
                        <img src="<?php echo wp_get_attachment_url( $set['image'] )?>"
                            alt="<?php echo $set['title_left'].$set['title_left'] ?>">
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="services--background fade-in-service"></div>
        </div>
        <div class="service__list-content">
            <?php foreach($settings as $index=>$set): ?>
            <div class="service__list-contant-inner ">
                <div class="service__list-item-content-title <?php  if($index < 2) {echo 'slide-in-left';}; if($index > 3){ echo 'slide-in-right';}; if($index == 2 || $index === 3){echo "slide-in-top";}?>">
                    <a class="<?php  if($index <= 2 || $index === 3){echo "tracking-in-expand-fwd";} else{echo "tracking-in-contract";}  ?>" href="<?php echo get_page_link((int)$set['link']) ?>">
                        <?php if(!wp_is_mobile()):?>
                        <span><?php echo $set['title_left'] ?></span>
                        <span><?php echo $set['title_right'] ?></span>
                        <?php else:?>
                        <span><?php echo $set['title_left'] ?><?php echo $set['title_right'] ?></span>
                        <?php endif;?>
                    </a>
                </div>
                <div class="service__list-item-content-des <?php if($index > 3){ echo 'tracking-in-contract';};if($index <= 2 || $index === 3){echo "tracking-in-expand-fwd";}  ?>" href="<?php echo get_page_link((int)$set['link']) ?>">
                    <?php echo $set['description'] ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <div class="services__list-contain-mobile">
            <?php foreach($settings as $set): ?>
            <div class="service__list-item-mobile">
                <div class="service__list-item-content-mobile">
                        <div class="service__list-item-content-title slide-in-top-mobile">
                            <a href="<?php echo get_page_link((int)$set['link']) ?>">
                            <?php if(!wp_is_mobile()):?>
                                <span><?php echo $set['title_left'] ?></span>
                                <span><?php echo $set['title_right'] ?></span>
                                <?php else:?>
                                    <span><?php echo $set['title_left'] ?><?php echo $set['title_right'] ?></span>
                                    <?php endif;?>
                            </a>
                        </div>
                    </div>
                <div class="service__list-item-img-mobile">
                    <a href="<?php echo get_page_link((int)$set['link']) ?>" >
                        <img src="<?php echo wp_get_attachment_url( $set['image'] )?>"
                            alt="<?php echo $set['title_left'].$set['title_left'] ?>">
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php endif;?>