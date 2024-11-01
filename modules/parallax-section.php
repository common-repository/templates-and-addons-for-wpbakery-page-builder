<?php
vc_map(array(
    "name" 			=> "Parallax Section",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_parallax",
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
            "type" => "textfield",
            "heading" => __("Title", 'tavc'),
            "param_name" => "title",
            "description" => __("", 'tavc')
        ),         
        array(
            "type" => "dropdown",
            "class" => "",
            "heading" => __("Show Button:", "tavc"),
            "param_name" => "show_btn",
            "value" => array(
                __("Yes","tavc") => "yes",
                __("No","tavc") => "",
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Text", 'tavc'),
            "param_name" => "btn_text",
            "description" => __("", 'tavc'),
            'dependency' => array(
                'element' => 'show_btn',
                'value' => 'yes',
            ),
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button URL", 'tavc'),
            "param_name" => "btn_url",
            "description" => __("", 'tavc'),
            'dependency' => array(
                'element' => 'show_btn',
                'value' => 'yes',
            ),
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
            "value"       => 45,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "description" => __("Choose heading font size as pixel. Default is 45px", "asvc"),
            "group"       => "Styles"
        ),
        array(
            "type"        => "colorpicker",
            "class"       => "",
            "heading"     => __( "Heading Font color", "asvc" ),
            "param_name"  => "heading_color",
            "description" => __( "Choose heading color", "asvc" ),
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
            "type" => "textfield",
            "heading" => esc_attr__("Extra class name", 'tavc'),
            "param_name" => "el_class",
            "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'tavc')
        ),        

    )
    
));

function tavc_parallax_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'title' => '',
        'show_btn' => '',
        'btn_text' => '',
        'btn_url' => '',
        'btn_styles' => 'white-button',
        'heading_font' => '',
        'heading_f_size' => '',
        'heading_color' => '#fff',
        'heading_font_style' => '',        
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
    
    
    $html_btn = '';
    if (!empty($btn_text)):
        $html_btn = '<a href="'.$btn_url.'" class="'.$btn_styles.' button-md">'.$btn_text.'</a>';
    endif;
    
    $html .= '<div class="section-block-parallax jarallax black-overlay-20 '.$el_class.'" data-jarallax data-speed="0.6"  style="background-image: url('.$image[0].');">
    <div class="">
        <div class="large-heading center-holder">
            <h2 style="'.$heading_styles.'" class="white-color">'.$title.'</h2>
            <div class="section-heading-line"></div>
        </div>
        <div class="mt-25 center-holder">
        '.$html_btn.'
        </div>
    </div>
</div>';
    

    return $html;
}

add_shortcode("tavc_parallax", "tavc_parallax_shortcode");