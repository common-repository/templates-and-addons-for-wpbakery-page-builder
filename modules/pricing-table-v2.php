<?php
vc_map(array(
    "name" 			=> "Pricing Table v2",
    "category" 		=> 'Templates & Addons',
    "description"	=> "Pricing table with parallax",
    "base" 			=> "tavc_pricing_table_v2",
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
            "type" => "textarea",
            "heading" => __("Description", 'tavc'),
            "param_name" => "desc",
            "description" => __("", 'tavc')
        ),
        
        
        
                                                      
        array(
            'type' => 'param_group',
            'heading' => __( 'Table Group', 'js_composer' ),
            'param_name' => 'pricing_groups',
            'group' => 'Pricing Group',
            'params' => array(
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
                    'type' => 'textfield',
                    'heading' => __( 'Price List 1', 'js_composer' ),
                    'param_name' => 'price_list_1',
                    'description' => __( '', 'js_composer' ),
                    'value' => '',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Price List 2', 'js_composer' ),
                    'param_name' => 'price_list_2',
                    'description' => __( '', 'js_composer' ),
                    'value' => '',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Price List 3', 'js_composer' ),
                    'param_name' => 'price_list_3',
                    'description' => __( '', 'js_composer' ),
                    'value' => '',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Price List 4', 'js_composer' ),
                    'param_name' => 'price_list_4',
                    'description' => __( '', 'js_composer' ),
                    'value' => '',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Price List 5', 'js_composer' ),
                    'param_name' => 'price_list_5',
                    'description' => __( '', 'js_composer' ),
                    'value' => '',
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Price List 6', 'js_composer' ),
                    'param_name' => 'price_list_6',
                    'description' => __( '', 'js_composer' ),
                    'value' => '',
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
                
                
            ),
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
            "value"       => 22,
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

function tavc_pricing_table_v2_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'title' => '',
        'desc' => '',
        'pricing_groups' => '',
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
    $image = wp_get_attachment_image_src( $image, 'full' );
    $pricing_groups = vc_param_group_parse_atts($pricing_groups);
    
    
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
    
    
        
    $pricing_html ='';
    if ($pricing_groups !== ''){
        $pricing_html .= '<div class="mg-row mt-50">';
        foreach ($pricing_groups as $group) {
            
            $button = vc_build_link( $group['button'] );
            $highlight = !empty($group['highlight']) ? $group['highlight'] : '';
                        
            $price_list_1 = !empty($group['price_list_1']) ? $group['price_list_1'] : '';
            $price_list_2 = !empty($group['price_list_2']) ? $group['price_list_2'] : '';
            $price_list_3 = !empty($group['price_list_3']) ? $group['price_list_3'] : '';
            $price_list_4 = !empty($group['price_list_4']) ? $group['price_list_4'] : '';
            $price_list_5 = !empty($group['price_list_5']) ? $group['price_list_5'] : '';
            $price_list_6 = !empty($group['price_list_6']) ? $group['price_list_6'] : '';
     
            $price_list_1 = '<li style="'.$desc_styles.'">'.$price_list_1.'</li>';
            $price_list_2 = '<li style="'.$desc_styles.'">'.$price_list_2.'</li>';
            $price_list_3 = '<li style="'.$desc_styles.'">'.$price_list_3.'</li>';
            $price_list_4 = '<li style="'.$desc_styles.'">'.$price_list_4.'</li>';
            $price_list_5 = '<li style="'.$desc_styles.'">'.$price_list_5.'</li>';
            $price_list_6 = '<li style="'.$desc_styles.'">'.$price_list_6.'</li>';
                                
            $highlight_class ='';
            if($highlight == 'yes'){
                $highlight_class .= 'pricing-list-recomended';
            }
            $btn_html ='';
            if($button['title'] !== '') {
                $btn_html .= '<a href="'.$button['url'].'" target="'.$button['target'].'">'.$button['title'].'</a>';
            }
        
            $pricing_html .= '<div class="mg-col-md-4 mg-col-sm-4 mg-col-xs-12 ">
         		<div class="pricing-list '.$highlight_class.'">
     				<h3 style="'.$heading_styles.'">'.$group['package_name'].'</h3>
         			<div class="pricing-list-price">
         				<h2><sup>'.$group['price_currency'].'</sup>'.$group['price'].'</h2>
         				<div class="pricing-list-term">
         					<h6>'.$group['package_basis'].'</h6>
         				</div>
         				<ul class="pricing-list-products mt-15">
         					
         					'.$price_list_1.'
                            '.$price_list_2.'
                            '.$price_list_3.'
                            '.$price_list_4.'
                            '.$price_list_5.'
                            '.$price_list_6.'
                            
         				</ul>
         			</div>
         			<div class="pricing-list-button mt-10">
                        '.$btn_html.'
                    </div>
 		 		</div>
         	</div>';
        }
        $pricing_html .='</div>';
    }    
    


    
    
    $html .= '<div class="section-block-parallax jarallax black-overlay-60 '.$el_class.'" data-jarallax data-speed="0.6"  style="background-image: url('.$image[0].');">
    <div class="mg-container">
        <div class="large-heading white-color center-holder">
            <h2>'.$title.'</h2>
            <div class="section-heading-line"></div>
            <p>'.$desc.'</p>
        </div>		
         
        '.$pricing_html.'
        
        </div>
        </div>';
    

    return $html;
}

add_shortcode("tavc_pricing_table_v2", "tavc_pricing_table_v2_shortcode");