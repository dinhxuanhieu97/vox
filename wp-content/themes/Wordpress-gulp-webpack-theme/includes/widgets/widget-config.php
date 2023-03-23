<?php 
function _themename_widgets_init(){
    register_sidebar(
        array(
            'name'          => 'Sidebar Contact Widget',
            'id'            => 'sidebar_contact_widget',
            'before_widget' => '<div class="ella-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title--widget text--upcase">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => 'Sidebar Blog Widget',
            'id'            => 'sidebar_blog_widget',
            'before_widget' => '<div class="ella-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title--widget text--upcase">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => 'Sidebar Product Category Widget',
            'id'            => 'sidebar_product_cat_widget',
            'before_widget' => '<div class="ella-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title--widget text--upcase">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => 'Footer left Widget',
            'id'            => 'footer_left_widget',
            'before_widget' => '<div class="ella-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title--widget text--upcase">',
            'after_title'   => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name'          => 'Footer right Widget',
            'id'            => 'footer_right_widget',
            'before_widget' => '<div class="ella-widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="title--widget text--upcase">',
            'after_title'   => '</h3>',
        )
    );
}
add_action( 'widgets_init', '_themename_widgets_init' );