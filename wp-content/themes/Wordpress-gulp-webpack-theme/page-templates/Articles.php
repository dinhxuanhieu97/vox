<?php
/**
 * template name: Articles PAGE
 */
get_header();
?>
<div class="main-page">
    <div class="main-page-container">
        <div class="articles-page">
            <div class="articles-page-container container">
                <div class="articles-page--top">
                    <?php get_template_part('sections/archive-categories/latest-views')?>
                </div>
                <div class="articles-page--body">
                    <div class="articles-body__container">
                        <div class="row-divide">
                            <div class="articles-list articles-col col-divide-7 col-divide-lg-12 cat-col">
                                <?php
                                    $terms = get_field('display_category_body_section');
                                    foreach ($terms as $term_item):
                                        _e('<div class="article-title"><h1 class="label-title '.$term_item->name.'-label">' . $term_item->name . '</h1><h1 class="box-title">'.$term_item->name.'</h1></div>');
                                        _e('<div class="articles-list-item">');
                                        get_post_articles($term_item->term_id, 4);
                                        _e('</div>');
                                    endforeach;
                                ?>
                            </div>
                            <div class="articles-col col-divide-5 col-divide-lg-12 social-widget-col">
                                <?php get_template_part('sections/archive-categories/social');?>
                                <div class="most-popular-post">
                                    <div class="article-title">
                                        <h1 class="label-title no-trans">Most popular</h1>
                                    </div>
                                    <div class="post-list-widget">
                                        <?php
                                    $args = array(
                                        'post_status' => 'published',
                                        'post_type' => 'post',
                                        'showposts' => 5,
                                    );
                                    $the_query = new WP_Query($args);
                                    while ($the_query-> have_posts()):
                                        $the_query->the_post();
                                        get_template_part('sections/archive-categories/post-item-widget');
                                    endwhile;
                                    wp_reset_postdata();
                                ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="articles-page--bottom">
                    <div class="articles-bottom__container">
                        <div class="row-divide">
                            <?php
                                $terms2 = get_field('display_category_bottom_section');
                                var_dump($terms2);
                                foreach ($terms2 as $term_item):
                                    _e('<div class="articles-list col-divide-6 col-divide-lg-12">');
                                    _e('<div class="article-title"><h1 class="label-title '.$term_item->name.'-label">' . $term_item->name . '</h1></div>');
                                    _e('<div class="articles-list-item">');
                                    get_post_articles($term_item->term_id, 4);
                                    _e('</div>');
                                    _e('</div>');
                                endforeach;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer("home");
?>