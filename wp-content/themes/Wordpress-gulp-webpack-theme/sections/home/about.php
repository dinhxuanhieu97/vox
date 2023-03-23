<div class="about section">
    <div class="about__container container">
        <?php if(get_theme_mod('about__home_subtitle_text')):  ?>
        <div class="about__subtitle">
            <h2>
                <?php echo get_theme_mod('about__home_subtitle_text');?>
            </h2>
        </div>
        <?php endif;?>
        <?php if(get_theme_mod('about__home_title_text')):  ?>
        <div class="about__title">
            <h1 class="">
                <?php echo get_theme_mod('about__home_title_text');?>
            </h1>
        </div>
        <?php endif;?>
        <?php if(get_theme_mod('about_home_description')):  ?>
        <div class="about__description">
            <?php echo get_theme_mod( 'about_home_description') ?>
        </div>
        <?php endif;?>
    </div>
</div>