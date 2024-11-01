<?php
vc_map(array(
    "name"             => "Counter v2",
    "category"         => 'Templates & Addons',
    "description"    => "Counter with parallax background",
    "base"             => "tavc_counter_v2",
    "class"         => "",
    "icon"             => "tavc_icon",
    
    "params"     => array(
    
        array(
            "type" => "attach_image",
            "heading" => __("Parralax Background Image", "tavc"),
            "param_name" => "image",
            "value" => "",
            "description" => __("", "tavc")
        ),
        array(
            'type' => 'param_group',
            'heading' => __( 'Counter Items', 'js_composer' ),
            'param_name' => 'counter_items',
            'params' => array(
            
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
                    'type' => 'iconpicker',
                    'heading' => __( 'Counter icon', 'js_composer' ),
                    'param_name' => 'icon_fa',
                    'value' => 'fa fa-users',
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

function tavc_counter_v2_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'counter_items' => '',
        'heading_font' => '',
        'heading_f_size' => '',
        'heading_color' => '',
        'heading_font_style' => '',
        'icon_size' => '',        
        'icon_color' => '',                
        'el_class' =>'',

    ), $atts));    
    
    $image = wp_get_attachment_image_src( $image, 'full' );
    $counter_items = vc_param_group_parse_atts($counter_items);
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
    
         
    $html .= '<div class="section-block-parallax jarallax black-overlay-60 '.$el_class.'" data-jarallax data-speed="0.6"  style="background-image: url('.$image[0].');">
    <div class="mg-container">
        <div class="mg-row">';      
    
    foreach ($counter_items as $counter_item ){
    $html .= '<div class="mg-col-md-3 mg-col-sm-6">
                <div class="countup-block">
                    <i style="font-size:'.$icon_size.'px; color:'.$icon_color.'" class="'.$counter_item['icon_fa'].'"></i>
                    <h4 class="countup">'.$counter_item['count_num'].' </h4><span>+</span>
                    <h3 style="'.$heading_styles.'">'.$counter_item['title'].'</h3>
                </div>
            </div>';
    }            
    $html .= '</div>
                </div>
            </div>';    

    return $html;
}

add_shortcode("tavc_counter_v2", "tavc_counter_v2_shortcode");