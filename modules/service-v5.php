<?php
vc_map(array(
    "name" 			=> "Service v5",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_service_v5",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
        array(
            "type" => "attach_image",
            "heading" => __("Image", "tavc"),
            "param_name" => "image",
            "value" => "",
            "description" => __("perfect size is: 262x184", "tavc")
        ),
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
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Create Link", "tavc"),
            "param_name" => "create_link",
            "value" => array(
                __("Yes","tavc") => "yes",
                __("No","tavc") => "",
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", 'tavc'),
            "param_name" => "link",
            "description" => __("", 'tavc'),
            'dependency' => array(
                'element' => 'create_link',
                'value' => 'yes',
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
            "value"       => 14,
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

function tavc_service_v5_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'title' => '',
        'desc' => '',
        'create_link' => '',
        'link' => '',
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
    
    $image = wp_get_attachment_image_src( $image, 'full' );
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
    
    $html_link = '';
    if (!empty($link)){
        $html_link = '<h4 style="'.$heading_styles.'"><a href="'.$link.'">'.$title.'</a></h4>';
    }else{
        $html_link = '<h4 style="'.$heading_styles.'">'.$title.'</h4>';
    }
    
    $html .= '<div class="service-block-2 '.$el_class.'">
                    <img src="'.$image[0].'" alt="">
                    <div class="service-block-2-inner">
                        '.$html_link.'
                        <p style="'.$desc_styles.'">'.$desc.'</p>					
                    </div>
                </div>';
    

    return $html;
}

add_shortcode("tavc_service_v5", "tavc_service_v5_shortcode");