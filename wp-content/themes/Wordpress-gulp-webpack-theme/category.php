<?php
get_header();
$category = get_queried_object();
?>
<div class="main-page">
    <div class="main-page-container">
        <div class="category-page">
            <div class="category-page-container container">
                <div class="category-banner">
                    <div class="category-banner-img">
                        <?php
                            if(get_field('title_image_category','category_'.$category->term_id)){
                                ?>
                        <img src="<?php echo get_field('title_image_category','category_'.$category->term_id)?>"
                            alt="img">
                        <?php
                            }
                        ?>
                    </div>
                </div>
                <?php get_template_part('sections/archive-categories/latest-views')?>
                <div class="category-post-list">
                    <!-- <div class="row-divide"> -->
                    <?php
                    $args = array(
                        'post_status' => 'published',
                        'post_type' => 'post',
                        'showposts' => 8,
                        'cat' => $category->term_id,
                    );
                    $the_query = new WP_Query($args);
                    $count = 0;
                    while ($the_query-> have_posts()):
                        $the_query->the_post();
                        get_template_part('sections/archive-categories/post-item');
                    endwhile;
                    wp_reset_postdata();
                    ?>
                    <!-- </div> -->

                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer("home");
?>