<?php
require_once THEME_DIR.'/includes/core/imagecow/imagecow/src/autoloader.php';
require_once THEME_DIR.'/includes/core/imagecow/imagecow/src/Image.php';
require_once THEME_DIR.'/includes/core/imagecow/imagecow/src/ImageException.php';

use Imagecow\Image;

/**
 * create_directory_image
 *
 * @param  mixed $path
 * @return void
 */
function create_directory_image($path){
    if(!is_dir($path)){
        wp_mkdir_p($path);
    }
}

function clean_special_character_from_string($string) {
     // Replaces all spaces with hyphens.
    $string = str_replace(' ', '-', $string); 
     // Removes special chars.
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}
/**
 * crop_image
 *
 * @param  mixed $url
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function crop_image($url,$width,$height){   
    // analytic url
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];
    $year = explode( '/', $name )[0];
    $month = explode( '/', $name )[1];
    $path = 'uploads/'.$year.'/'.$month;
    // create directory when directory exists;
    create_directory_image($path);
    // do crop image
    $image = Image::fromFile($url);
    $image->autoRotate();
    $image->resizeCrop($width, $height,Image::CROP_BALANCED);
    $image->format($type);   
    $image->save('wordpress/uploads/'.$name.'-'.$width.'x'.$height.'.'.$type);
}

/**
 * get_image_crop_url
 *
 * @param  mixed $url
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function get_image_crop_url($url,$width,$height){
    if (!$url){
        $file_name_path_crop = get_template_directory().'/no-thumb.jpg';
    }
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];    
    $file_name_path_crop = 'wordpress/uploads/'.$name.'-'.$width.'x'.$height.'.'.$type;
    if (!file_exists($file_name_path_crop)) {
        crop_image($url,$width,$height);
    } 
    return get_bloginfo('url').'/'.$file_name_path_crop;
}
/**
 * the_image_crop_url
 *
 * @param  mixed $url
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function the_image_crop_url($url,$width,$height){
    if (!$url){
        $file_name_path_crop = get_template_directory().'/no-thumb.jpg';
    }
    
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];    
    $file_name_path_crop = 'wordpress/uploads/'.$name.'-'.$width.'x'.$height.'.'.$type;
    if (!file_exists($file_name_path_crop)) {
        crop_image($url,$width,$height);
    } 
    echo get_bloginfo('url').'/'.$file_name_path_crop;
}

/**
 * the_image_crop
 *
 * @param  mixed $url
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function the_image_crop($url,$width,$height){
    if (!$url){
        $file_name_path_crop = get_template_directory().'/no-thumb.jpg';
    }else{
        $file = explode( 'uploads/', $url )[1];
        $name = explode( '.', $file )[0];
        $type = explode( '.', $file )[1];
        $types = $type;
        if($type === "jpg"){
            $types = "jpeg";
        }
        $title = explode( '/', $name )[2];
        $alt = clean_special_character_from_string($title).'-wolfactive-'.$width.'x'.$height;
        $file_name_path_crop = 'wordpress/uploads/'.$name.'-'.$width.'x'.$height.'.'.$type;
        if (!file_exists($file_name_path_crop)) {
            crop_image($url,$width,$height);
        } 
    }
        echo '<img src="'.get_bloginfo('url').'/'.$file_name_path_crop.'" alt="'.$alt.'" >';
}

function get_image_crop($url,$width,$height){
    if (!$url){
        $file_name_path_crop = get_template_directory().'/no-thumb.jpg';
    }else{
        $file = explode( 'uploads/', $url )[1];
        $name = explode( '.', $file )[0];
        $type = explode( '.', $file )[1];
        $types = $type;
        if($type === "jpg"){
            $types = "jpeg";
        }
        $title = explode( '/', $name )[2];
        $alt = clean_special_character_from_string($title).'-wolfactive-'.$width.'x'.$height;
        $file_name_path_crop = 'wordpress/uploads/'.$name.'-'.$width.'x'.$height.'.'.$type;
        if (!file_exists($file_name_path_crop)) {
            crop_image($url,$width,$height);
        } 
    }
        return '<img src="'.get_bloginfo('url').'/'.$file_name_path_crop.'" alt="'.$alt.'" >';
}


/**
 * get_thumbnail_crop_url
 *
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function get_thumbnail_crop_url($width,$height){
    $url = get_the_post_thumbnail_url();
    if (!$url){
        $file_name_path_crop = get_template_directory().'/no-thumb.jpg';
    }
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];    
    $file_name_path_crop = 'wordpress/uploads/'.$name.'-'.$width.'x'.$height.'.'.$type;
    if (!file_exists($file_name_path_crop)) {
        crop_image($url,$width,$height);
    } 
    return get_bloginfo('url').'/'.$file_name_path_crop;
}

/**
 * the_thumbnail_crop_url
 *
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function the_thumbnail_crop_url($width,$height){
    $url = get_the_post_thumbnail_url();
    if (!$url){
        $file_name_path_crop = get_template_directory().'/no-thumb.jpg';
    }
    $file = explode( 'uploads/', $url )[1];
    $name = explode( '.', $file )[0];
    $type = explode( '.', $file )[1];    
    $file_name_path_crop = 'wordpress/uploads/'.$name.'-'.$width.'x'.$height.'.'.$type;
    if (!file_exists($file_name_path_crop)) {
        crop_image($url,$width,$height);
    } 
    echo get_bloginfo('url').'/'.$file_name_path_crop;
}

/**
 * the_thumbnail_crop
 *
 * @param  mixed $width
 * @param  mixed $height
 * @return void
 */
function the_thumbnail_crop($width,$height){
    $url = get_the_post_thumbnail_url();
    if (!$url){
        $file_name_path_crop = get_template_directory().'/no-thumb.jpg';
    }else{
        $file = explode( 'uploads/', $url )[1];
        $name = explode( '.', $file )[0];
        $type = explode( '.', $file )[1];    
        $title = explode( '/', $name )[2];
        $alt = clean_special_character_from_string($title).'-wolfactive-'.$width.'x'.$height;
        $file_name_path_crop = 'wordpress/uploads/'.$name.'-'.$width.'x'.$height.'.'.$type;
        if (!file_exists($file_name_path_crop)) {
            crop_image($url,$width,$height);
        } 
    }
    echo '<img src="'.get_bloginfo('url').'/'.$file_name_path_crop.'" alt="'.$alt.'" >';
}


function get_thumbnail_crop($width,$height){
    $url = get_the_post_thumbnail_url();
    if (!$url){
        $file_name_path_crop = get_template_directory().'/no-thumb.jpg';
    }else{
        $file = explode( 'uploads/', $url )[1];
        $name = explode( '.', $file )[0];
        $type = explode( '.', $file )[1];    
        $title = explode( '/', $name )[2];
        $alt = clean_special_character_from_string($title).'-wolfactive-'.$width.'x'.$height;
        $file_name_path_crop = 'wordpress/uploads/'.$name.'-'.$width.'x'.$height.'.'.$type;
        if (!file_exists($file_name_path_crop)) {
            crop_image($url,$width,$height);
        } 
    }
    return '<img src="'.get_bloginfo('url').'/'.$file_name_path_crop.'" alt="'.$alt.'" >';
}