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
    "name" 			=> "Contact Section v1",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_contact_section_v1",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
        array(
            "type" => "attach_image",
            "heading" => __("Parralax Background Image", "tavc"),
            "param_name" => "image",
            "value" => "",
            "description" => __("perfect size is: 1500x680", "tavc")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Section Title", 'tavc'),
            "param_name" => "title",
            "description" => __("", 'tavc')
        ),                 
        array(
            'type' => 'param_group',
            'heading' => __( 'Contact Info', 'js_composer' ),
            'param_name' => 'contact_infos',
            
            'params' => array(
            
                array(
                    "type" => "textfield",
                    "heading" => __("Text 1", 'tavc'),
                    "param_name" => "text1",
                    "description" => __("", 'tavc')
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Text 2", 'tavc'),
                    "param_name" => "text2",
                    "description" => __("", 'tavc')
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Icon in left', 'js_composer' ),
                    'param_name' => 'icon',
                    'value' => 'fa fa-adjust',
                    // default value to backend editor admin_label
                    'settings' => array(
                        'emptyIcon' => false,
                        // default true, display an "EMPTY" icon?
                        'iconsPerPage' => 4000,
                        // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                        'type' => 'fontawesome',
                    ),
                    'description' => __( 'Select icon from library.', 'js_composer' ),
                ),
                
                
                
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Contact Form Title", 'tavc'),
            "param_name" => "contact_title",
            "description" => __("", 'tavc')
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

function tavc_contact_section_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'contact_infos' => '',
        'title' => '',
        'contact_title' => '',
        'contact_form' => '',
        'el_class' =>'',

    ), $atts));    
    
    
    $html = '';      
    $image = wp_get_attachment_image_src( $image, 'full' );
    $contact_infos = vc_param_group_parse_atts($contact_infos);
    
    
    $contact_html ='';
    if ($contact_infos !== ''){
        foreach ($contact_infos as $contact_info) {
            $contact_html .= '<div class="contact-icon-box-sm">
                        <i class="'.$contact_info['icon'].'"></i>
                        <h4>'.$contact_info['text1'].'</h4>
                        <h5>'.$contact_info['text2'].'</h5>
                    </div>';
        }
    }
    
    if ($contact_form){
        $cform = do_shortcode( '[contact-form-7 id="'.$contact_form.'"]' );
    }
    
    
    $html .= '<div class="section-block-parallax jarallax black-overlay-70 '.$el_class.'" data-jarallax data-speed="0.6"  style="background-image: url('.$image[0].');">
      <div class="mg-container">
        <div class="mg-row">
            <div class="mg-col-md-7 mg-col-sm-12">
                <div class="section-heading white-color left-holder">
                    <h2 class="bold">'.$title.'</h2>
                    <div class="section-heading-line"></div>
                </div>

                <div class="mt-0">
                    '.$contact_html.'
                </div>
                
            </div>

            <div class="mg-col-md-5 mg-col-sm-12">
                <div class="contact-form-md white-background">
                    <h4 class="center-holder">'.$contact_title.'</h4>
                    '.$cform.'
                </div>
            </div>	
</div></div></div>';
    

    return $html;
}

add_shortcode("tavc_contact_section_v1", "tavc_contact_section_v1_shortcode");