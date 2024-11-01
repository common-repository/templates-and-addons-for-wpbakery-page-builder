<?php
vc_map(array(
    "name" 			=> "Call To Action v1",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_call_to_action_v1",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
        array(
            "type" => "textfield",
            "heading" => __("Title", 'tavc'),
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
            "heading" => __("Button Text", 'tavc'),
            "param_name" => "btn_text",
            "description" => __("Leave blank for no button", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button URL", 'tavc'),
            "param_name" => "btn_url",
            "description" => __("keep blank if dont need", 'tavc')
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Button Styles", "asvc"),
            "param_name" => "btn_styles",
            "value" => array(
                "Default" => "",
                "Primary" => "primary-button",
                "White" => "white-button",
                "Dark" => "dark-button",
                "Grey" => "grey-button",
            ),
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
            "value"       => 33,
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
            "value"       => 15,
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

function tavc_call_to_action_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'title' => '',
        'desc' => '',
        'btn_text' => '',
        'btn_url' => '',
        'btn_styles' => 'primary-button',
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
    
    
    $btn_html = '';
    if ( !empty($btn_text) ){
        $btn_html = '<a href="'.$btn_url.'" class="button-md '.$btn_styles.'">'.$btn_text.'</a>';
    }      
    
    $html .= '<div class="action-box action-box-md center-holder-xs '.$el_class.'">
                <div class="mg-container">
                    <div class="mg-row">
                        <div class="mg-col-md-10 mg-col-sm-10">
                            <h3 style="'.$heading_styles.'" class="bold">'.$title.'</h3>
                            <p style="'.$desc_styles.'">'.$desc.'</p>	
                        </div>
                        <div class="mg-col-md-2 mg-col-sm-2 right-holder center-holder-xs">
                            '.$btn_html.'
                        </div>
                    </div>
                </div>
            </div>';
    

    return $html;
}

add_shortcode("tavc_call_to_action_v1", "tavc_call_to_action_v1_shortcode");