<?php
vc_map(array(
    "name" 			=> "Testimonial Section v1",
    "category" 		=> 'Templates & Addons',
    "description"	=> "testimonals carousel with parallax",
    "base" 			=> "tavc_testimonial_section_v1",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
        array(
            "type" => "attach_image",
            "heading" => __("Parralax Background Image", "tavc"),
            "param_name" => "image",
            "value" => "",
            "description" => __("", "tavc")
        ),
        array(
            'type' => 'param_group',
            'heading' => __( 'Testimonial Groups', 'js_composer' ),
            'param_name' => 'testimonial_groups',
            'params' => array(
                array(
                    'type' => 'textarea',
                    'heading' => __( 'Testimonial Text', 'js_composer' ),
                    'param_name' => 'text',
                    'description' => __( '', 'js_composer' ),
                    'value' => '',
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Name", 'tavc'),
                    "param_name" => "name",
                    "description" => __("", 'tavc')
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Designation", 'tavc'),
                    "param_name" => "desig",
                    "description" => __("Leave empty if you dont want", 'tavc')
                ),                
            ),
        ),
        array(
            "type" => "dropdown",
            "holder" => "",
            "class" => "",
            "heading" => __("Name Font", "asvc"),
            "param_name" => "heading_font",
            "value" => tavc_google_font(),
            //"std" => 'Advent+Pro',
            'group' => 'Styles',
        ),
        array(
            'type'        => 'prime_slider',
            'heading'     => __( 'Name Font Size', 'asvc' ),
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
            "heading"     => __( "Name Font color", "asvc" ),
            "param_name"  => "heading_color",
            "group"       => "Styles"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Name Font Style", "asvc"),
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

function tavc_testimonial_section_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'testimonial_groups' => '',
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

    $testimonial_groups = vc_param_group_parse_atts($testimonial_groups);
    $testimonial_carousel_html ='';
    if ($testimonial_groups !== ''){
        foreach ($testimonial_groups as $testimonial_group) {
            $desig_html = '';
            if(!empty($testimonial_group['desig'])){
                $desig_html = '<strong>'.$testimonial_group['desig'].'</strong>';
            }
            $testimonial_carousel_html .= '<div class="testmonial-parallax center-holder">
                <div class="testmonial-parallax-text">
                    <h6 class="libre-baskerville"><i class="fa fa-quote-left"></i></h6>
                    <p style="'.$desc_styles.'" class="italic libre-baskerville">'.$testimonial_group['text'].'</p>
                    <h4 style="'.$heading_styles.'">'.$testimonial_group['name'].'</h4>
                    '.$desig_html.'
                </div>
            </div>';
        }
    }
    
    $html .= '<div class="section-block-parallax jarallax black-overlay-70 '.$el_class.'" data-jarallax data-speed="0.6"  style="background-image: url('.$image[0].');">
    <div class="mg-container">	
        <div class="owl-carousel owl-theme" id="testmonials-parallax"> 

            '.$testimonial_carousel_html.'

        </div>	
    </div>
</div>';
    

    return $html;
}

add_shortcode("tavc_testimonial_section_v1", "tavc_testimonial_section_v1_shortcode");