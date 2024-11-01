<?php

$tavc_cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

$tavc_contact_forms = array();
if ( $tavc_cf7 ) {
    foreach ( $tavc_cf7 as $cform ) {
        $tavc_contact_forms[ $cform->post_title ] = $cform->ID;
    }
} else {
    $tavc_contact_forms[ __( 'No contact forms found', 'js_composer' ) ] = 0;
}

vc_map(array(
    "name" 			=> "Contact Form v1",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_contact_form_v1",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(                
        array(
            "type" => "textfield",
            "heading" => __("Contact Form Title", 'tavc'),
            "param_name" => "contact_title",
            "description" => __("Leave empty if you dont want", 'tavc')
        ),             
        array(
            'type' => 'dropdown',
            'heading' => __( 'Select contact form', 'js_composer' ),
            'param_name' => 'contact_form',
            'value' => $tavc_contact_forms,
            'save_always' => true,
            'description' => __( 'Choose previously created contact form 7 from the drop down list.', 'js_composer' ),
        ),        
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Extra class name", 'tavc'),
            "param_name" => "el_class",
            "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'tavc')
        ),        

    )
    
));

function tavc_contact_form_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'contact_title' => '',
        'contact_form' => '',
        'el_class' =>'',

    ), $atts));    
    
    
    $html = '';  
    
    $html_title = '';
    if (!empty($contact_title)):
        $html_title = '<div class="section-heading left-holder">
                        <h4 class="bold">'.$contact_title.'</h4>
                        <div class="section-heading-line"></div>				
                    </div>';
    endif;        
    
    if ($contact_form){
        $cform = do_shortcode( '[contact-form-7 id="'.$contact_form.'"]' );
    }
    
    
    $html .= '	 
    
            '.$html_title.'			
            <div class="contact-form-md white-background no-padding pl-30-md '.$el_class.'">
                '.$cform.'
            </div>';
    

    return $html;
}

add_shortcode("tavc_contact_form_v1", "tavc_contact_form_v1_shortcode");