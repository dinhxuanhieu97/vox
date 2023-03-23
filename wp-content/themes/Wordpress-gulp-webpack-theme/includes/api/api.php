<?php  
add_action('rest_api_init','sava_hambuger_option');
function sava_hambuger_option(){
    register_rest_route('hambuger/v1','/save-data',array(
        'methods'   =>  "POST",
        'callback'  =>  'sava_hambuger_option_callback',   
        'permission_callback' => '__return_true',
    ));
}
function sava_hambuger_option_callback($request){
    $submit = prefix_sava_hambuger_option_callback();
    return rest_ensure_response($submit);
}
function prefix_sava_hambuger_option_callback (){
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    if ($contentType === "application/json") {
        //Receive the RAW post data.
        $content = trim(file_get_contents("php://input"));
        $decoded = json_decode($content, true);
        // setup default result data
        $result = array(            
            'status' => 0,
            'message' => '',
            'error'=>'',           
        );
        if (wp_verify_nonce( $decoded['wp_rest'], 'wp_rest' )) {
            $logo = $decoded['logo'];
            $menu_secondary = $decoded['menu_secondary'];
            $content_left = $decoded['content_left'];
            get_option( 'hambuger_logo') ?  update_option( 'hambuger_logo', $logo, 'yes' ) :   add_option( 'hambuger_logo', $logo, '', 'yes' );
            get_option( 'menu_secondary') ? update_option( 'menu_secondary', $menu_secondary, 'yes' ) : add_option( 'menu_secondary', $menu_secondary, '', 'yes' );
            get_option( 'content_left') ? update_option( 'content_left', $content_left, 'yes' ) : add_option( 'content_left', $menu_secondary, '', 'yes' );
            
        }
    }
}
/* Api Send Mail */
add_action('rest_api_init','send_mail_contact');
function send_mail_contact(){
    register_rest_route('contact/v1','/send-mail',array(
        'methods'   =>  "POST",
        'callback'  =>  'send_mail_contact_callback',   
        'permission_callback' => '__return_true',
    ));
}

function send_mail_contact_callback($request){
    $submit = prefix_send_mail_contact_callback();
    return rest_ensure_response($submit);
}

function prefix_send_mail_contact_callback (){
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
    $result = "Submit form failed";
    if ($contentType === "application/json") {
        //Receive the RAW post data.
        $content = trim(file_get_contents("php://input"));
        $decoded = json_decode($content, true);
        // setup default result data
        if (wp_verify_nonce( $decoded['wp_rest'], 'wp_rest' )) {
            $name = $decoded['name'];
            $email = $decoded['email'];
            $phone = $decoded['phone'];
            $budget = $decoded['budget'];
            $inquiry = $decoded['inquiry'];
            if($name && $email && $phone && $budget && $inquiry && is_array($inquiry)){
                $check = vox_send_mail_notification_contact(get_theme_mod('general_email_text'),$name,$email,$phone,$budget,$inquiry);
                $check ? $result = "Submit form success" : $result = "Submit form failed";
            }
        }
    }
    api_return_json($result);
}

function api_return_json( $php_array ) {  
    // encode result as json string
    $json_result = json_encode( $php_array );   
    // return result
    die( $json_result );    
    // stop all other processing 
    exit;
}

function vox_send_mail_notification_contact($to,$name,$email,$phone,$budget,$inquiry){
    $subject = 'Thông Báo Submit Form trang Contact - '.date(DATE_RFC822);
    $body = '
        <p><strong>Name: </strong>'.$name.'</p>
        <p><strong>Phone: </strong>'.$phone.'</p>
        <p><strong>Email: </strong>'.$email.'</p>
        <p><strong>Budget: </strong>'.$budget.'</p>
        <p><strong>Inquiry About: </strong>'.implode(", ",$inquiry).'</p>
    ';
    $headers = array('Content-Type: text/html; charset=UTF-8','From: VOX <noreply@voxagency.asia>');
    return wp_mail( $to, $subject, $body, $headers );
}