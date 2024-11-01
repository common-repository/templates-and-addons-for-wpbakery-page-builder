<?php
vc_map(array(
    "name" 			=> "Pricing Table v1",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_pricing_table_v1",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
        array(
            "type" => "textfield",
            "heading" => __("Package Name", 'tavc'),
            "param_name" => "package_name",
            "description" => __("", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Package Basis", 'tavc'),
            "param_name" => "package_basis",
            "value" => "Per Month",
            "description" => __("", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price currency", 'tavc'),
            "param_name" => "price_currency",
            "value" => "$",
            "description" => __("", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Price", 'tavc'),
            "param_name" => "price",
            "description" => __("", 'tavc')
        ),                                 
        array(
            'type' => 'param_group',
            'heading' => __( 'Package Features', 'js_composer' ),
            'param_name' => 'features',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Feature Name', 'js_composer' ),
                    'param_name' => 'feature_name',
                    'description' => __( '', 'js_composer' ),
                    'value' => '',
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Content icon', 'js_composer' ),
                    'param_name' => 'icon_fa',
                    'value' => 'fa fa-check-circle',
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
            "type" => "vc_link",
            "class" => "",
            "heading" => __("Button Text and Link", "asvc"),
            "param_name" => "button",
            "value" => "",
            "description" => __("Add a custom link or select existing page. You can remove existing link as well.", "asvc"),
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Make it Highlight', 'js_composer' ),
            'param_name' => 'highlight',
            'value' => array( __( 'Yes', 'js_composer' ) => 'yes' ),
            "description" => __("Make sure you have to check this once to hightlight one pricing", "asvc"),
        ),
        array(
            "type" => "dropdown",
            "holder" => "",
            "class" => "",
            "heading" => __("Pricing Title Font", "asvc"),
            "param_name" => "heading_font",
            "value" => tavc_google_font(),
            //"std" => 'Advent+Pro',
            'group' => 'Styles',
        ),
        array(
            'type'        => 'prime_slider',
            'heading'     => __( 'Title Font Size', 'asvc' ),
            'param_name'  => 'heading_f_size',
            "value"       => 16,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "group"       => "Styles"
        ),
        array(
            "type"        => "colorpicker",
            "class"       => "",
            "heading"     => __( "Title Font color", "asvc" ),
            "param_name"  => "heading_color",
            "group"       => "Styles"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Title Font Style", "asvc"),
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
            'heading' => __('<h3 class="hvc_notice" align="center">Pricing List Font Styles</h3>', 'hvc'),
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

function tavc_pricing_table_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'package_name' => '',
        'package_basis' => 'Per Month',
        'price_currency' => '$',
        'price' => '',
        'features' => '',
        'button' => '',
        'highlight' => 'false',
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
    
    $button = vc_build_link( $button );
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
    
              
    $highlight_class ='';
    if($highlight == 'yes'){
        $highlight_class .= 'pricing-plan-emphasise';
    }
    $btn_html ='';
    if($button['title'] !== '') {
        $btn_html .= '<a href="'.$button['url'].'" target="'.$button['target'].'">'.$button['title'].'</a>';
    }
    $features = vc_param_group_parse_atts($features);
    $features_html ='';
    if ($features !== ''){
        $features_html .= '<ul>';
        foreach ($features as $feature) {
            $features_html .= '<li style="'.$desc_styles.'"><i class="'.$feature['icon_fa'].'"></i>'.$feature['feature_name'].'</li>';
        }
        $features_html .='</ul>';
    }
    
    
    $html .= '<div class="pricing-plan center-holder '.$highlight_class.' '.$el_class.'">
                    <h4 style="'.$heading_styles.'">'.$package_name.'</h4>
                    <strong>'.$package_basis.'</strong>
                    <h3><sup>'.$price_currency.'</sup>'.$price.'</h3>
                    
                    '.$features_html.'
                    '.$btn_html.'
                    
                </div>';
    

    return $html;
}

add_shortcode("tavc_pricing_table_v1", "tavc_pricing_table_v1_shortcode");