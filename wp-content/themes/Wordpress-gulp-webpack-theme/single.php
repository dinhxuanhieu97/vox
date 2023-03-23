 <?php
get_header();
$categories=get_the_category(get_the_ID());
?>
<<<<<<< HEAD
 <section class="wrapper main-page" id="single-<?php the_ID()?>">
 <div class="category-banner container">
                    <div class="category-banner-img">
                        <?php
                            if(get_field('title_image_category','category_'.$categories[0]->term_id)){
                                ?>
                                <img src="<?php echo get_field('title_image_category','category_'.$categories[0]->term_id)?>" alt="img">
                                <?php
                            }
                        ?>
                    </div>
                </div>
     <div class="container single-divide">
         <div class="colum-left my-20 col-divide-9 col-divide-lg-12">
=======
 <section class="wrapper main-page" id="single-<?php the_ID() ?>">
   <div class="container single-divide">
     <div class="colum-left my-20">
	 
     <?php	if ( have_posts() ) {
		// Load posts loop.
		while ( have_posts() ) { the_post();?>
		<picture>
			<source srcset="<?php echo get_thumbnail_crop_url(1200,560); ?>"	media="(min-width: 1900px)">
			<source srcset="<?php echo get_thumbnail_crop_url(900,560); ?>"	media="(min-width: 1365px)">
			<source srcset="<?php echo get_thumbnail_crop_url(900,560); ?>"	media="(min-width: 1024px)">
			<source srcset="<?php echo get_thumbnail_crop_url(400,250); ?>"	media="(min-width: 768px)">
			<source srcset="<?php echo get_thumbnail_crop_url(300,200); ?>"	media="(min-width: 430px)">
			<img src="<?php the_post_thumbnail_url(); ?>" alt="" />
		</picture>
		<div class="title-single"><h1><?php the_title(); ?></h1></div>
		<div class="single__content "> <?php the_content() ?>	</div>
			<?php }} ?>
	</div>
     <div class="colum-right">
       <div class="single__subscribe">
	   <?php $form_shortcode = get_theme_mod( 'single_form_shortcode',); ?>
		   <?php echo do_shortcode($form_shortcode); ?>
		</div>
>>>>>>> 239346524e1d969b197a96869868de87b9ff08b0

             <?php	if (have_posts()) {
    // Load posts loop.
    while (have_posts()) {the_post();?>
             <div class="feature-blog">
                 <picture>
                 <source srcset="<?php echo get_thumbnail_crop_url(300, 200); ?>" media="(max-width: 430px)">
                 <source srcset="<?php echo get_thumbnail_crop_url(400, 250); ?>" media="(max-width: 768px)">
					 <source srcset="<?php echo get_thumbnail_crop_url(900, 560); ?>" media="(max-width: 1024px)">
					 
                     
                     <source srcset="<?php echo get_thumbnail_crop_url(1200, 560); ?>" media="(max-width: 1920px)">
                     <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="image" />
                 </picture>
                 <div class="title-single">
                     <h1><?php the_title();?></h1>
                 </div>
             </div>
             <div class="single__content "> <?php the_content()?> </div>
             <?php }}?>
         </div>
         <div class="colum-right col-divide-3 col-divide-lg-12">
             <div>
                 <?php $form_shortcode = get_theme_mod('single_form_shortcode', );?>
                 <?php echo do_shortcode($form_shortcode); ?>
             </div>

             <div class="latest-post">
                 <p class="latest-post-title">Latest post</p>
                 <?php
$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'paged' => $paged,
);
$new_list = new WP_Query($args);
if ($new_list->have_posts()): ?>
                 <div class="latest-post-content">
                     <?php while ($new_list->have_posts()): $new_list->the_post();?>
                     <a href="<?php the_permalink();?>">
                     <div class="row-divide">
                     <div class="latest-post-content-thumbnail col-divide-5 col-divide-lg-3 col-divide-sm-4"><?php the_post_thumbnail('thumbnail')?></div>
                         <h4 class="latest-post-content-title col-divide-7 col-divide-lg-9 col-divide-sm-8"><?php echo the_title(); ?></h4>
                     </div>
                         
                     </a>
                     <?php endwhile;
wp_reset_postdata();?>
                     <?php
else:esc_html_e('No testimonials in the diving taxonomy!', 'text-domain');
endif;?>
                 </div>


             </div>
             <div class="single__banner-ads">
                 <?php $image = get_theme_mod('image_single_url', );?>
                 <?php the_image_crop($image, 400, 300)?>
             </div>
         </div>
     </div>
 </section>
 <?php
get_footer();
?>