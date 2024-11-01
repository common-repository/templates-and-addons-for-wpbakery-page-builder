<?php
vc_map(array(
    "name" 			=> "Features Section v2",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_features_section_v2",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
    
        array(
            "type" => "attach_image",
            "heading" => __("Image", "tavc"),
            "param_name" => "image",
            "value" => "",
            "description" => __("perfect size is: 510x564", "tavc")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", 'tavc'),
            "param_name" => "title",
            "description" => __("", 'tavc')
        ),        
        array(
            'type' => 'param_group',
            'heading' => __( 'Features Group', 'js_composer' ),
            'param_name' => 'features_groups',
            'params' => array(
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Feature icon', 'js_composer' ),
                    'param_name' => 'icon_fa',
                    'value' => 'fa fa-bullseye',
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
            "value"       => 13,
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
            'type'        => 'prime_slider',
            'heading'     => __( 'Icon Size', 'asvc' ),
            'param_name'  => 'icon_size',
            "value"       => 50,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "description" => __("Choose icon size as pixel. Default is 60px", "asvc"),
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

function tavc_features_section_v2_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'title' => '',
        'features_groups' => '',
        'heading_font' => '',
        'heading_f_size' => '',
        'heading_color' => '',
        'heading_font_style' => '',
        'desc_font' => '',
        'desc_f_size' => '',
        'desc_color' => '',
        'desc_font_style' => '',        
        'icon_size' => '',        
        'el_class' =>'',

    ), $atts));    
    
    $html = '';
    $image = wp_get_attachment_image_src( $image, 'full' ); 
    $features_groups = vc_param_group_parse_atts($features_groups);
    
    
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
        
    
    $features_html ='';
    if ($features_groups !== ''){
        foreach ($features_groups as $features_group) {
            $features_html .= '<div class="mg-col-md-6 mg-col-sm-12 mg-col-xs-12">
                        <div class="feature-block-3 left-holder">
                            <i style="font-size:'.$icon_size.'px" class="'.$features_group['icon_fa'].'"></i>
                            <h4 style="'.$heading_styles.'">'.$features_group['title'].'</h4>
                            <p style="'.$desc_styles.'">'.$features_group['desc'].'</p>
                        </div>				
                    </div>';
        }
    }
            
    $html .= '<div class="mg-container '.$el_class.'">
        <div class="mg-row">	
            <div class="mg-col-md-6 mg-col-sm-12">
                <div class="pr-45-md">
                    <img src="'.$image[0].'" class="rounded-border shadow-primary full-width" alt="">
                </div>
            </div>		

            <div class="mg-col-md-6 mg-col-sm-12">
                <div class="section-heading left-holder">
                    <h3 class="bold">'.$title.'</h3>
                    <div class="section-heading-line"></div>
                </div>
                		
                <div class="mg-row mt-20">
                    '.$features_html.'						
                </div>
                
                				
            </div>				
        </div>			
    </div>';
    

    return $html;
}

add_shortcode("tavc_features_section_v2", "tavc_features_section_v2_shortcode");