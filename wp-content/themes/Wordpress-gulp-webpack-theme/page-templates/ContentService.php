<?php
/**
 * template name: Content Service Page
 */
get_header('home');
?>
<section class="content_service">
    <section class="title_and_desc">
        <div class="title_and_desc-container">
            <div class="big-title">
                <?php echo get_theme_mod('big_title_design_page_setting_ct', 'title no action' ) ?>
            </div>
            <div class="row-decs">
                <div class="left-desc">
                    <p><?php echo get_theme_mod('design_text_desc_left_setting_ct', 'title no action' ) ?></p>
                </div>
                <div class="right-desc">
                    <p><?php echo get_theme_mod('design_text_desc_right_setting_ct', 'title no action' ) ?></p>
                </div>
            </div>
        </div>
    </section>
    <section class="show_project">
        <div class="show_project_container">
            <?php 
            $settings_proj = get_theme_mod( 'mc_project_repeater_setting_ct'); ?>
            <?php $countProject; foreach( $settings_proj as $mc_setting ) : ?>
            <?php if($countProject % 2 == 0){ ?>
            <div class="show_project_row">
                <div class="sp_one_col">
                    <div class="title-project">
                        <span class="no-bg"><?php echo $mc_setting['mc_title_custom_ct']; ?></span><span
                            class="bg-white">&nbsp;<?php echo $mc_setting['mc_title_bg_custom_ct']; ?></span>
                    </div>
                    <div class="description-project">
                        <?php echo $mc_setting['mc_desc_custom_ct']; ?>
                    </div>
                    <div class="view-project">
                        <a class="" href="<?php echo $mc_setting['mc_link_custom_ct']; ?>">view project</a>
                    </div>
                </div>
                <div class="sp_one_col">
                    <div class="img-project">
                        <img src="<?php echo wp_get_attachment_url( $mc_setting['mc_img_project_ct'] ); ?>"
                            alt="images-project">
                    </div>
                </div>
            </div>
            <?php }else{
                ?>
            <div class="show_project_row">
                <div class="sp_one_col">
                    <div class="img-project">
                        <img src="<?php echo wp_get_attachment_url( $mc_setting['mc_img_project_ct'] ); ?>"
                            alt="images-project">
                    </div>
                </div>
                <div class="sp_one_col">
                    <div class="title-project">
                        <span class="no-bg"><?php echo $mc_setting['mc_title_custom_ct']; ?></span><span
                            class="bg-white">&nbsp;<?php echo $mc_setting['mc_title_bg_custom_ct']; ?></span>
                    </div>
                    <div class="description-project">
                        <?php echo $mc_setting['mc_desc_custom_ct']; ?>
                    </div>
                    <div class="view-project">
                        <a class="" href="<?php echo $mc_setting['mc_link_custom_ct']; ?>">view project</a>
                    </div>
                </div>
            </div>
            <?php 
            } ?>
            <?php $countProject ++; endforeach; ?>
        </div>
    </section>
    <section class="light_page">
        <div class="light_bg_top">
            <?php $imageBglight = get_theme_mod( 'img_bg_sec_3_setting_ct', '' ); ?>
            <img src="<?php echo esc_url( $imageBglight ); ?>" alt="bg_img">
        </div>
        <div class="light_container">
            <div class="light_row">
                <?php 
            $settings_light = get_theme_mod( 'bd_reater_setting_ct'); ?>
                <?php $countProject; foreach( $settings_light as $light_setting ) :
                    ?>
                    <?php if ( true == $light_setting['bd_check_active_light_ct'] ) : ?>
                        <div class="one_light active">
                    <?php else : ?>
                        <div class="one_light">
                    <?php endif; ?>
                    <a href="<?php echo $light_setting['bd_link_light_ct']; ?>">
                        <div class="img-light">
                            <img src="<?php echo wp_get_attachment_url( $light_setting['bd_immg_light_ct'] ); ?>"
                                alt="img-light">
                        </div>
                        <div class="name_light_page">
                            <?php echo $light_setting['bd_name_page_ct']; ?>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="workflow">
        <div class="workflow-container">
            <div class="title-workflow">
                    workflow
            </div>
            <div class="workflow-contain">
                <?php $bgWorkflow = get_theme_mod( 'background_workflow_setting_url_ct', '' ); ?>
                <img src="<?php echo esc_url( $bgWorkflow ); ?>" alt="bg-workflow">
                <?php $workflow_repeater = get_theme_mod( 'workflow_repeater_setting_ct'); ?>
                <?php foreach( $workflow_repeater as $item ) : ?>
                    <div class="one-workflow">
                        <div class="first-row">
                            <div class="number_wordflow">
                                <?php echo $item['number_workflow_ct']; ?>
                            </div>
                            <div class="small_title_workflow">
                                <?php echo $item['small_title_workflow_ct']; ?>
                            </div>
                        </div>
                        <div class="description_workflow">
                            <?php echo $item['description_workflow_ct']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="wf_background_bottom">
            <?php $bgWorkflowBottom = get_theme_mod( 'background_workflow_bottom_setting_url_ct', '' ); ?>
            <img src="<?php echo esc_url( $bgWorkflowBottom ); ?>" alt="bg-workflow">
        </div>
    </section>
    <section class="sp_give_us">
        <div class="client">
            <div class="client__container">
                <div class="client__contain-main">
                    <div class="client__contain-main-decore fade-in">
                        <?php echo get_theme_mod('title_gvus_setting_ct', 'title no action' ) ?>
                    </div>
                </div>
                <div class="client__job slide-in-right">
                    <div class="client__job-title">
                        <?php echo get_theme_mod('title_gvus_setting_ct', 'title no action' ) ?>
                        <span>
                            <?php echo get_theme_mod('small_title_yd_setting_ct', 'title no action' ) ?>
                        </span>
                    </div>
                    <div class="client__job-menu">
                        <div class="client__job-menu-button">
                            <img src="<?php echo home_url() ?>/dist/images/arrow-up.png" alt="arrow-button-up" class="lazy loading" data-ll-status="loading">
                            <span>job</span>
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
        </div>
    </section>
</section>
<?php
get_footer('home');
?>