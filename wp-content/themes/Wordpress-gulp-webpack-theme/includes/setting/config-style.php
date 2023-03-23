<?php   
class _themename_Style_Config{
    function __construct() {
        add_action('init', array( $this, '_themename_complie_style_sheet_admin' ));
    }

    function _themename_complie_style_sheet_admin(){
        $stylesheet_file_url = THEME_DIR.'/dist/css/setting.css';
        $file_style_sheet_array = array(
            // 'includes/style-config/styles/menu-style.css',
        );
        $style_in_style_sheet_file ='';
        foreach ($file_style_sheet_array as $style){
            $style_in_style_sheet_file .= file_get_contents(THEME_DIR.'/'.$style);
            $style_in_style_sheet_file .= " ";
        }
        file_put_contents($stylesheet_file_url, $style_in_style_sheet_file);
    }
}
new _themename_Style_Config();