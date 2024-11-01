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
    "name" 			=> "Callback Section v1",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_callback_section_v1",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
    
        array(
            "type" => "textfield",
            "heading" => __("Section Title", 'tavc'),
            "param_name" => "title",
            "description" => __("", 'tavc')
        ),                 
        array(
            "type" => "textarea",
            "heading" => __("Description", 'tavc'),
            "param_name" => "desc",
            "description" => __("", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Email", 'tavc'),
            "param_name" => "email",
            "description" => __("Leave empty if you dont want", 'tavc')
        ),        
        array(
            "type" => "textfield",
            "heading" => __("Location", 'tavc'),
            "param_name" => "location",
            "description" => __("Leave empty if you dont want", 'tavc')
        ),

        array(
            "type" => "textfield",
            "heading" => __("Contact Form Title", 'tavc'),
            "param_name" => "contact_title",
            "description" => __("", 'tavc'),
            "group"   => "Contact Form"
        ),             
        array(
            'type' => 'dropdown',
            'heading' => __( 'Select contact form', 'js_composer' ),
            'param_name' => 'contact_form',
            'value' => $tavc_contact_forms,
            'save_always' => true,
            'description' => __( 'Choose previously created contact form 7 from the drop down list.', 'js_composer' ),
            "group"   => "Contact Form"
        ),
        array(
            "type" => "dropdown",
            "holder" => "",
            "class" => "",
            "heading" => __("Heading Font", "asvc"),
            "param_name" => "heading_font",
            "value" => tavc_google_font(),
            //"std" => 'Advent+Pro',
            'group' => 'Styles',
        ),
        array(
            'type'        => 'prime_slider',
            'heading'     => __( 'Heading Font Size', 'asvc' ),
            'param_name'  => 'heading_f_size',
            "value"       => 36,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "group"       => "Styles"
        ),
        array(
            "type"        => "colorpicker",
            "class"       => "",
            "heading"     => __( "Heading Font color", "asvc" ),
            "param_name"  => "heading_color",
            "group"       => "Styles"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Heading Font Style", "asvc"),
            "param_name" => "heading_font_style",
            "value" => array(
                "None" => "",
                "Italic" => "italic",
            ),
            "group"       => "Styles"
        ),
        array(
            "type" => "hvc_notice",
            "class" => "",
            'heading' => __('<h3 class="hvc_notice" align="center">Description Font Styles</h3>', 'hvc'),
            "param_name" => "hvc_notice_param_1",
            "value" => '',
            "group"       => "Styles"
        ),                                 
        array(
            "type" => "dropdown",
            "holder" => "",
            "class" => "",
            "heading" => __("Description Font", "asvc"),
            "param_name" => "desc_font",
            "value" => tavc_google_font(),
            'group' => 'Styles',
        ),
        array(
            'type'        => 'prime_slider',
            'heading'     => __( 'Description Font Size', 'asvc' ),
            'param_name'  => 'desc_f_size',
            "value"       => 17,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "group"       => "Styles"
        ),
        array(
            "type"        => "colorpicker",
            "class"       => "",
            "heading"     => __( "Description Font color", "asvc" ),
            "param_name"  => "desc_color",
            "group"       => "Styles"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Description Font Style", "asvc"),
            "param_name" => "desc_font_style",
            "value" => array(
                "None" => "",
                "Italic" => "italic",
            ),
            "group"       => "Styles"
        ),                
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Extra class name", 'tavc'),
            "param_name" => "el_class",
            "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'tavc')
        ),        

    )
    
));

function tavc_callback_section_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'title' => '',
        'desc' => '',
        'email' => '',
        'location' => '',
        'contact_title' => '',
        'contact_form' => '',
        'heading_font' => '',
        'heading_f_size' => '',
        'heading_color' => '',
        'heading_font_style' => '',
        'desc_font' => '',
        'desc_f_size' => '',
        'desc_color' => '',
        'desc_font_style' => '',        
        'el_class' =>'',

    ), $atts));    
    
    
    $html = '';
    

    $heading_styles = '';
    if($heading_font != ''){
        $html .= '<style>@import url(https://fonts.googleapis.com/css?family='.$heading_font.');</style>';
    }
    if($heading_font != ''){
        $heading_font = str_replace('+', ' ', $heading_font);
        $heading_styles .= ' font-family: '.$heading_font.'; ';
    }
    if(!empty($heading_f_size)){
        $heading_styles .= ' font-size: '.$heading_f_size.'px; ';
    }    
    if(!empty($heading_color)){
        $heading_styles .= ' color: '.$heading_color.'; ';
    }
    if($heading_font_style == 'italic'){
        $heading_styles .= ' font-style: '.$heading_font_style.'; ';
    }    
    
    $desc_styles = '';
    if($desc_font != ''){
        $html .= '<style>@import url(https://fonts.googleapis.com/css?family='.$desc_font.');</style>';
    }
    if($desc_font != ''){
        $desc_font = str_replace('+', ' ', $desc_font);
        $desc_styles .= ' font-family: '.$desc_font.'; ';
    }
    if(!empty($desc_f_size)){
        $desc_styles .= ' font-size: '.$desc_f_size.'px; ';
    }    
    if(!empty($desc_color)){
        $desc_styles .= ' color: '.$desc_color.'; ';
    }
    if($desc_font_style == 'italic'){
        $desc_styles .= ' font-style: '.$desc_font_style.'; ';
    }
    
              
    $email_html='';
    if (!empty($email)){
        $email_html = '<div class="mg-col-md-6 mg-col-sm-12">
                        <div class="contact-icon-box-dark-color">
                            <div class="contact-icon-box-sm">
                                <i class="fa fa-envelope-open"></i>
                                <h4>E-mail Adress</h4>
                                <h5>'.$email.'</h5>
                            </div>									
                        </div>						
                    </div>';
    }
    
    $location_html='';
    if (!empty($location)){
        $location_html = '<div class="mg-col-md-6 mg-col-sm-12">
                        <div class="contact-icon-box-dark-color">
                            <div class="contact-icon-box-sm">
                                <i class="fa fa-globe"></i>
                                <h4>Our Location</h4>
                                <h5>'.$location.'</h5>
                            </div>									
                        </div>						
                    </div>';
    }    
    
    if ($contact_form){
        $cform = do_shortcode( '[contact-form-7 id="'.$contact_form.'"]' );
    }
    
    $html .= '<div class="mg-container '.$el_class.'">
        <div class="mg-row">
            <div class="mg-col-md-7 mg-col-sm-6">
                <div class="section-heading left-holder">
                    <h3 style="'.$heading_styles.'" class="bold">'.$title.'</h3>
                    <div class="section-heading-line"></div>
                </div>

                <div class="text-content-big">
                    <p style="'.$desc_styles.'">'.$desc.'</p>					
                </div>

                <div class="row mt-20">
                    '.$email_html.'
                    '.$location_html.'
                    						
                </div>	

            </div>
            <div class="mg-col-md-4 mg-col-sm-6 mg-offset-md-1">
                <div class="contact-form-md white-background shadow-light center-holder">
                    <h5>'.$contact_title.'</h5>
                    
                    '.$cform.'
                    
                </div>
            </div>
        </div>
    </div>';
    

    return $html;
}

add_shortcode("tavc_callback_section_v1", "tavc_callback_section_v1_shortcode");