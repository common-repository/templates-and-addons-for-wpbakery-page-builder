<?php
vc_map(array(
    "name"             => "Counter v1",
    "category"         => 'Templates & Addons',
    "description"    => "",
    "base"             => "tavc_counter_v1",
    "class"         => "",
    "icon"             => "tavc_icon",
    
    "params"     => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", 'tavc'),
            "param_name" => "title",
            "description" => __("", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Count Number", 'tavc'),
            "param_name" => "count_num",
            "description" => __("", 'tavc')
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Add counter icon?', 'js_composer' ),
            'param_name' => 'counter_icon',
        ),        
        array(
            'type' => 'iconpicker',
            'heading' => __( 'Counter icon', 'js_composer' ),
            'param_name' => 'counter_icon_fontawesome',
            'value' => 'fa fa-adjust',
            // default value to backend editor admin_label
            'settings' => array(
                'emptyIcon' => false,
                // default true, display an "EMPTY" icon?
                'iconsPerPage' => 4000,
                // default 100, how many icons per/page to display, we use (big number) to display all icons in single page
                'type' => 'fontawesome',
            ),
            'dependency' => array(
                'element' => 'counter_icon',
                'value' => 'true',
            ),
            'description' => __( 'Select icon from library.', 'js_composer' ),
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
            "value"       => 13,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "description" => __("Choose heading font size as pixel. Default is 13px", "asvc"),
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
            'type'        => 'prime_slider',
            'heading'     => __( 'Icon Size', 'asvc' ),
            'param_name'  => 'icon_size',
            "value"       => 60,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "description" => __("Choose icon size as pixel. Default is 60px", "asvc"),
            "group"       => "Styles"
        ),
        array(
            "type"        => "colorpicker",
            "class"       => "",
            "heading"     => __( "Icon color", "asvc" ),
            "param_name"  => "icon_color",
            "description" => __( "Choose icon color", "asvc" ),
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

function tavc_counter_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'title' => '',
        'count_num' => '',
        'counter_icon' => '',
        'counter_icon_fontawesome' => 'fa fa-adjust',
        'heading_font' => '',
        'heading_f_size' => '',
        'heading_color' => '',
        'heading_font_style' => '',        
        'icon_size' => '',        
        'icon_color' => '',        
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
    
        
    if ( $counter_icon == true) {
        $icon_html = '<div class="countup-box-left">
                        <i style="font-size:'.$icon_size.'px; color:'.$icon_color.'" class="'.$counter_icon_fontawesome.'"></i>
                    </div>';
    }else{
        $icon_html = '';
    }      
    
    $html .= '<div class="countup-box '.$el_class.'">
                    '.$icon_html.'
                    <div class="countup-box-right">
                        <h4 class="countup">'.$count_num.'</h4>
                        <h5 style="'.$heading_styles.'">'.$title.'</h5>                    
                    </div>                
                </div>';
    

    return $html;
}

add_shortcode("tavc_counter_v1", "tavc_counter_v1_shortcode");