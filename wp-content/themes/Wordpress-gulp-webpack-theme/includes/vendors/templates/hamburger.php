<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css"/> 
<script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.es5.min.js"></script>
<?php 
$script = "var apiObject = " . wp_json_encode(array('homeUrl' => home_url(),'rootapiurl' => rest_url(),'nonce' => wp_create_nonce('wp_rest'))). ';';
if ( ! empty( $data ) ) {
    $script = "$data\n$script";
}
_e("\n<script type=\"text/javascript\">\n $script \n</script>\n",'_themename');
?>
<link rel="stylesheet" href="<?php echo home_url() ?>/dist/css/main.css">
<script defer src="<?php echo get_theme_file_uri('includes/vendors/scripts/handle-script.js') ?>"></script>
<section class="hamburger__headding" style="text-align: center; text-transform: uppercase; color: #1c6182; font-family: 'Baloo Tamma 2', cursive; position: relative">
    <img src="<?php echo get_bloginfo('template_directory') ?>/thumb.jpg" style="max-width: 522px"  alt="">
    <h1 class="page-title">
        Hamburger Setting
    </h1>
    <div class="finish--button menu-setting-btn">
        <button class="btn" style="background:#009688">Lưu Cấu Hình</button>
    </div>
</section>
<section class="menu-setting">
    <h3>
        Main Menu Hamburger
    </h3>
    <div class="menu-setting-btn">
        <a href="<?php echo site_url('wp-admin/nav-menus.php') ?>" class="btn">
            Cấu hình
        </a>
    </div>
</section>
<section class="menu-setting menu-setting-btn image--upload">
    <h3>
        Upload Logo
    </h3>
        <?php
        $image_id = get_option( 'hambuger_logo' ) ;
        if ($image_id) {

            echo '<a href="#" class="misha-upl btn--upload"><img src="' . $image_id . '" /></a>
                        <a href="#" class="misha-rmv">Remove image</a>
                        <input type="hidden" name="misha-img" value="' . $image_id . '">';

        } else {

            echo '<a href="#" class="misha-upl btn--upload">Upload image</a>
                        <a href="#" class="misha-rmv" style="display:none">Remove image</a>
                        <input type="hidden" name="misha-img" value="">';

        }
        ?>
</section>
<section class="menu-secondary ">
<?php $menu_secondary = json_decode(get_option( 'menu_secondary' )) ?>
    <h3>
        Menu thứ 2
    </h3>
    <div class="menu-secondary__container">
        <div class="menu-secondary__item menu-setting">
            <div class="menu-secondary--img">
                <span class="label label-1st">Hình ảnh của Menu Item</span>
                <?php
                    if ($menu_secondary[0]->image) {

                        echo '<a href="#" class="misha-upl btn--upload"><img src="' . $menu_secondary[0]->image . '" /></a>
                                    <a href="#" class="misha-rmv">Remove image</a>
                                    <input type="hidden" name="misha-img" value="' . $menu_secondary[0]->image . '">';

                    } else {

                        echo '<a href="#" class="misha-upl btn--upload">Upload image</a>
                                    <a href="#" class="misha-rmv" style="display:none">Remove image</a>
                                    <input type="hidden" name="misha-img" value="">';

                    }
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label">Content của Menu Item</span>
                <input type="text" placeholder="Nhập content cho menu" value="<?php echo $menu_secondary[0]->content ?>">
            </div>
            <div class="menu-secondary--content">
                <span class="label">Chọn link cho menu item</span>
                <?php 
                wp_dropdown_pages(array('value_field' => $menu_secondary[0]->link));
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label" style="color:<?php echo $menu_secondary[0]->color ?>">Chọn màu background cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
            <div class="menu-secondary--text">
                <span class="label" style="color:<?php echo $menu_secondary[0]->text ?>">Chọn màu color cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
        </div>
        <div class="menu-secondary__item menu-setting">
            <div class="menu-secondary--img">
                <span class="label label-1st">Hình ảnh của Menu Item</span>
                <?php
                    if ($menu_secondary[1]->image) {

                        echo '<a href="#" class="misha-upl btn--upload"><img src="' . $menu_secondary[1]->image . '" /></a>
                                    <a href="#" class="misha-rmv">Remove image</a>
                                    <input type="hidden" name="misha-img" value="' . $menu_secondary[1]->image . '">';

                    } else {

                        echo '<a href="#" class="misha-upl btn--upload">Upload image</a>
                                    <a href="#" class="misha-rmv" style="display:none">Remove image</a>
                                    <input type="hidden" name="misha-img" value="">';

                    }
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label">Content của Menu Item</span>
                <input type="text" placeholder="Nhập content cho menu" value="<?php echo $menu_secondary[1]->content ?>">
            </div>
            <div class="menu-secondary--content">
                <span class="label">Chọn link cho menu item</span>
                <?php 
                wp_dropdown_pages(array('value_field' => $menu_secondary[1]->link));
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label" style="color:<?php echo $menu_secondary[1]->color ?>">Chọn màu background cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
            <div class="menu-secondary--text">
                <span class="label" style="color:<?php echo $menu_secondary[1]->text ?>">Chọn màu color cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
        </div>
        <div class="menu-secondary__item menu-setting">
            <div class="menu-secondary--img">
                <span class="label label-1st">Hình ảnh của Menu Item</span>
                <?php
                    if ($menu_secondary[2]->image) {

                        echo '<a href="#" class="misha-upl btn--upload"><img src="' . $menu_secondary[2]->image . '" /></a>
                                    <a href="#" class="misha-rmv">Remove image</a>
                                    <input type="hidden" name="misha-img" value="' . $menu_secondary[2]->image . '">';

                    } else {

                        echo '<a href="#" class="misha-upl btn--upload">Upload image</a>
                                    <a href="#" class="misha-rmv" style="display:none">Remove image</a>
                                    <input type="hidden" name="misha-img" value="">';

                    }
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label">Content của Menu Item</span>
                <input type="text" placeholder="Nhập content cho menu" value="<?php echo $menu_secondary[2]->content ?>">
            </div>
            <div class="menu-secondary--content">
                <span class="label">Chọn link cho menu item</span>
                <?php 
                wp_dropdown_pages(array('value_field' => $menu_secondary[2]->link));
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label" style="color:<?php echo $menu_secondary[2]->color ?>">Chọn màu background cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
            <div class="menu-secondary--text">
                <span class="label" style="color:<?php echo $menu_secondary[2]->text ?>">Chọn màu color cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
        </div>
        <div class="menu-secondary__item menu-setting">
            <div class="menu-secondary--img">
                <span class="label label-1st">Hình ảnh của Menu Item</span>
                <?php
                    if ($menu_secondary[3]->image) {

                        echo '<a href="#" class="misha-upl btn--upload"><img src="' . $menu_secondary[3]->image . '" /></a>
                                    <a href="#" class="misha-rmv">Remove image</a>
                                    <input type="hidden" name="misha-img" value="' . $menu_secondary[3]->image . '">';

                    } else {

                        echo '<a href="#" class="misha-upl btn--upload">Upload image</a>
                                    <a href="#" class="misha-rmv" style="display:none">Remove image</a>
                                    <input type="hidden" name="misha-img" value="">';

                    }
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label">Content của Menu Item</span>
                <input type="text" placeholder="Nhập content cho menu" value="<?php echo $menu_secondary[3]->content ?>">
            </div>
            <div class="menu-secondary--content">
                <span class="label">Chọn link cho menu item</span>
                <?php 
                wp_dropdown_pages(array('value_field' => $menu_secondary[3]->link));
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label" style="color:<?php echo $menu_secondary[3]->color ?>">Chọn màu background cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
            <div class="menu-secondary--text">
                <span class="label" style="color:<?php echo $menu_secondary[3]->text ?>">Chọn màu color cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
        </div>
        <div class="menu-secondary__item menu-setting">
            <div class="menu-secondary--img">
                <span class="label label-1st">Hình ảnh của Menu Item</span>
                <?php
                    if ($menu_secondary[4]->image) {

                        echo '<a href="#" class="misha-upl btn--upload"><img src="' . $menu_secondary[4]->image . '" /></a>
                                    <a href="#" class="misha-rmv">Remove image</a>
                                    <input type="hidden" name="misha-img" value="' . $menu_secondary[4]->image . '">';

                    } else {

                        echo '<a href="#" class="misha-upl btn--upload">Upload image</a>
                                    <a href="#" class="misha-rmv" style="display:none">Remove image</a>
                                    <input type="hidden" name="misha-img" value="">';

                    }
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label">Content của Menu Item</span>
                <input type="text" placeholder="Nhập content cho menu" value="<?php echo $menu_secondary[4]->content ?>">
            </div>
            <div class="menu-secondary--content">
                <span class="label" >Chọn link cho menu item</span>
                <?php 
                wp_dropdown_pages(array('value_field' => $menu_secondary[4]->link));
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label" style="color:<?php echo $menu_secondary[4]->color ?>">Chọn màu background cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
            <div class="menu-secondary--text">
                <span class="label" style="color:<?php echo $menu_secondary[4]->text ?>">Chọn màu color cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
        </div>
        <div class="menu-secondary__item menu-setting">
            <div class="menu-secondary--img">
                <span class="label label-1st">Hình ảnh của Menu Item</span>
                <?php
                    if ($menu_secondary[5]->image) {

                        echo '<a href="#" class="misha-upl btn--upload"><img src="' . $menu_secondary[5]->image . '" /></a>
                                    <a href="#" class="misha-rmv">Remove image</a>
                                    <input type="hidden" name="misha-img" value="' . $menu_secondary[5]->image . '">';

                    } else {

                        echo '<a href="#" class="misha-upl btn--upload">Upload image</a>
                                    <a href="#" class="misha-rmv" style="display:none">Remove image</a>
                                    <input type="hidden" name="misha-img" value="">';

                    }
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label">Content của Menu Item</span>
                <input type="text" placeholder="Nhập content cho menu" value="<?php echo $menu_secondary[5]->content ?>">
            </div>
            <div class="menu-secondary--content">
                <span class="label" >Chọn link cho menu item</span>
                <?php 
                wp_dropdown_pages(array('value_field' => $menu_secondary[5]->link));
                ?>
            </div>
            <div class="menu-secondary--content">
                <span class="label" style="color:<?php echo $menu_secondary[5]->color ?>">Chọn màu background cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
            <div class="menu-secondary--text">
                <span class="label" style="color:<?php echo $menu_secondary[5]->text ?>">Chọn màu color cho menu item</span>
                <input class="color_field" type="hidden" name="header_color" />
            </div>
        </div>
    </div>
</section>
<section class="content--seting vox--admin">
    <h3>
        Content bên tay trái
    </h3>
    <div class="container-editor">
    <?php 
        $content   = get_option( 'content_left' );
        $editor_id = 'mycustomeditor';
        $settings  = array( 'media_buttons' => true );
         
        wp_editor( $content, $editor_id, $settings );
    ?>
    </div>
</section>