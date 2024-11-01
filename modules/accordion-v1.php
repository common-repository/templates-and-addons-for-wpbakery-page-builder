<?php
vc_map(array(
    "name" 			=> "Accordion v1",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_accordion_v1",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
        array(
            "type" => "textfield",
            "heading" => __("Accordion Title", 'tavc'),
            "param_name" => "accor_title",
            "description" => __("Leave empty if you dont want", 'tavc')
        ),                               
        array(
            'type' => 'param_group',
            'heading' => __( 'Accordions Group', 'js_composer' ),
            'param_name' => 'accordions',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Title', 'js_composer' ),
                    'param_name' => 'title',
                    'description' => __( '', 'js_composer' ),
                    'value' => '',
                ),
                array(
                    "type" => "textarea",
                    "heading" => __("Content", 'tavc'),
                    "param_name" => "desc",
                    "value" => '',
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

function tavc_accordion_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'accor_title' => '',
        'accordions' => '',
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

    $html_title = '';
    if (!empty($accor_title)):
        $html_title = '<div class="section-heading left-holder">
                    <h4 class="bold">'.$accor_title.'</h4>
                    <div class="section-heading-line"></div>				
                </div>';
    endif;

    $accordions = vc_param_group_parse_atts($accordions);
    
    $accordions_html ='';
    if ($accordions !== ''){
        $accordions_html .= '
        
        '.$html_title.'
        
        <div id="accordion" role="tablist" class="mt-15 '.$el_class.'">';
        $id = rand('1000', '99999');
        $controls = rand('11111', '88888');
        foreach ($accordions as $accordion) {
            $accordions_html .= '<div class="card card-primary">
                    <div class="card-header card-header-primary" role="tab" id="'.$id.'">
                      <h5 class="mb-0">
                        <a style="'.$heading_styles.'" class="collapsed" data-toggle="collapse" href="#'.$controls.'" aria-expanded="false" aria-controls="'.$controls.'">
                          '.$accordion['title'].'
                        </a>
                      </h5>
                    </div>

                    <div id="'.$controls.'" class="collapse" role="tabpanel" aria-labelledby="'.$id.'" data-parent="#accordion">
                      <div class="card-body card-body-primary">
                        <p style="'.$desc_styles.'">'.$accordion['desc'].'</p>
                      </div>
                    </div>
                  </div>';
        $id++;
        $controls++;
        }
        $accordions_html .='</div>';
    }
    
    
    $html .= ''.$accordions_html.'';
    

    return $html;
}

add_shortcode("tavc_accordion_v1", "tavc_accordion_v1_shortcode");