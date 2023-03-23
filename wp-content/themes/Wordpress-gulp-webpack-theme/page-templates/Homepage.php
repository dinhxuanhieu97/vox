<?php
/**
 * template name: Home Page
 */
get_header('home'); 
?>
<section class="main-page scroll-container home-page-template" id="page-<?php the_ID() ?>">
  <?php get_template_part('sections/home/carousel') ?>
  <?php get_template_part('sections/home/about') ?>
  <?php get_template_part('sections/home/services') ?>
  <?php get_template_part('sections/home/client') ?>
  <?php get_footer('home'); ?>