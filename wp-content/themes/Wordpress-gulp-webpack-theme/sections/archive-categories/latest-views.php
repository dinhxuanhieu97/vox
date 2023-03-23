<div class="latest-views">
    <div class="latest-views-container">
        <div class="title-latest-views">
            <h1 class="label-title">
                Latest News
            </h1>
        </div>
        <div class="latest-post">
            <div class="latest-post-container">
                <div class="latest-post-list">
                    <?php 
                    $args = array();
                        if(is_category()){
                            $category = get_category( get_query_var( 'cat' ) );
                            $cat_id = $category->cat_ID;
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'showposts' => 3,
                                'order' => 'DESC',
                                'cat' => $cat_id,
                            );
                        } else{
                            $args = array(
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'showposts' => 3,
                                'order' => 'DESC',
                            );
                        }
                        
                        // $args2 = array(
                        //     'post_type' => 'post',
                        //     'post_status' => 'publish',
                        //     'showposts' => 2,
                        //     'order' => 'DESC',
                        //     'offset' => 1,
                        // );
                        $the_query = new WP_Query($args);
                        // $the_query2 = new WP_Query($args2);
                        if($the_query -> have_posts()):
                            // _e('<div class="last-post-left col-divide-lg-12">');
                            while($the_query -> have_posts()): $the_query->the_post();?>
                    <div class="latest-post-item col-divide-lg-12">
                    <a href="<?php the_permalink();?>" class="title-link">
                        <div class="latest-post-item-container">
                            <div class="latest-post-feature">
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID())?>" alt="image">
                            </div>
                            <div class="latest-post-info">
                                <div class="latest-post-background">
                                    <div class="title-post">
                                            <?php echo get_the_title(get_the_ID()); ?>
                                    </div>
                                    <div class="des-post">
                                        <?php the_excerpt();?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>

                    </div>
                    <?php
                            endwhile;
                            wp_reset_postdata();
                            // _e('</div>');
                        endif;
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>