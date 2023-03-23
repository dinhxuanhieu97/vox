<div class="hambugerMenu fade-in">
    <div class="hambugerMenu__container">
        <div class="hambugerMenu__container-close">
            <i class="fas fa-times"></i>
        </div>
        <div class="hambugerMenu__content">
            <div class="hambugerMenu__divide">
                <div class="hambugerMenu__column-medium">
                    <div class="hambugerMenu__logo">
                        <a href="<?php echo home_url() ?>">
                            <img src="<?php echo get_option( 'hambuger_logo') ?>" alt="logo-hambuger" >
                        </a>
                    </div>
                    <div class="hamburgerMenu__list">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'hambuger_nav' ));
                        ?>
                    </div>
                </div>
                <div class="hambugerMenu__column-small">
                    <?php $hambuger_sec = json_decode(get_option( 'menu_secondary' )) ?>
                    <?php 
                        if($hambuger_sec && is_array($hambuger_sec)): 
                            foreach($hambuger_sec as $item):
                    ?>
                        <div class="hambugerMenu__sec-item" style="background: <?php echo $item->color  ?>;">
                            <div class="hambugerMenu__sec-item-img">
                                <a href="<?php echo get_page_link($item->link) ?>">
                                    <img src="<?php echo $item->image ?>" alt="hambuger-item-alt">
                                </a>
                            </div>
                            <div class="hambugerMenu__sec-item-text">
                                <a href="<?php echo get_page_link($item->link) ?>" style="color: <?php echo $item->text ?>">
                                    <span class="not--full--text"><?php echo substr($item->content, -strlen($item->content),1) ?></span>
                                    <span class="full--text" style="background: <?php echo $item->color  ?>;"><?php echo $item->content ?></span>
                                </a>
                            </div>
                        </div>
                    <?php 
                        endforeach;
                        endif;
                    ?>
                </div>
                <div class="hambugerMenu__column-big">
                    <?php echo get_option( 'content_left') ?>
                </div>
            </div>
        </div>
    </div>
</div>