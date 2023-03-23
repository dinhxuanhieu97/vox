<?php
   warning_theme_active()
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Wolfactive - HuyNguyen - PhuongNam">
    <link rel="profile" href="https://wolfactive.net/">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="preload" href="<?php echo home_url()?>/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/Impact_0.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/Quakiez.otf" as="font" type="font/otf" crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/VLABELPRO-BOLD.OTF" as="font" type="font/otf"
        crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/VLABELPRO.OTF" as="font" type="font/otf" crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/VLKALEKOROUND-BOOK.OTF" as="font" type="font/otf"
        crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/SanFranciscoDisplay-Ultralight.otf" as="font"
        type="font/otf" crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/GMV_DIN_Pro-Bold.ttf" as="font" type="font/otf"
        crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/GMV_DIN_Pro-Light.ttf" as="font" type="font/otf"
        crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/GMV_DIN_Pro-Medium.ttf" as="font" type="font/otf"
        crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/SanFranciscoDisplay-Bold.otf" as="font" type="font/otf"
        crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/SanFranciscoDisplay-Thin.otf" as="font" type="font/otf"
        crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/SanFranciscoDisplay-Regular.otf" as="font"
        type="font/otf" crossorigin>
    <link rel="preload" href="<?php echo home_url()?>/webfonts/Roboto-Medium.ttf" as="font" type="font/otf" crossorigin>
    <link rel="stylesheet" href="<?php echo home_url()?>/dist/css/main.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <section class="header header-child">
        <div class="main--background">
            <div class="header__contain container">
                <div class="header__item">
                    <a href="<?php echo home_url(); ?>" class="d--block logo mr-auto">
                        <?php
             $custom_logo_id = get_theme_mod( 'custom_logo' );
             $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                ?>
                        <img src="<?php echo $image[0]; ?>" alt="logo-nha-pho-sai-gon">
                    </a>
                </div>
                <div class="header__item header__menu dp--none">
                    <?php
  	       wp_nav_menu(array(
  		    'theme_location' => 'main_nav' ));
  	      ?>
  	   </div>
  	   <div class="header__item toggle d--none dp--block">
           <button class="hamburger hamburger--collapse" type="button" aria-label="btn-navbar">
           <img src="<?php echo bloginfo('url') ?>/dist/images/navabar-button.png" alt="navbar-button">
         </button>
  	   </div>
        
  	</div>
  </div> 
    <div class="main--background" id="headerNavBar">
     <div class="container navbar__mb">
       <?php
      // wp_nav_menu(array('theme_location' => 'main_nav' ));
      ?>
            </div>
        </div>
    </section>