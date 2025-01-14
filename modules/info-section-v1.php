<?php
vc_map(array(
    "name" 			=> "Info Section v1",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_info_section_v1",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
        array(
            "type" => "attach_image",
            "heading" => __("Image", "tavc"),
            "param_name" => "image",
            "value" => "",
            "description" => __("perfect size is: 458x524", "tavc")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", 'tavc'),
            "param_name" => "title",
            "description" => __("", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title Highlight", 'tavc'),
            "param_name" => "title_hlt",
            "description" => __("You can use this field to highlight your title part, see demo", 'tavc')
        ),                 
        array(
            "type" => "textarea",
            "heading" => __("Description", 'tavc'),
            "param_name" => "desc",
            "value" => '',
            "description" => __("", 'tavc')
        ),
        array(
            'type' => 'param_group',
            'heading' => __( 'List Items Below Content', 'js_composer' ),
            'param_name' => 'list_items',
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => __( 'List Content', 'js_composer' ),
                    'param_name' => 'list_content',
                    'description' => __( '', 'js_composer' ),
                    'value' => 'Immigration consultant, Information technology consulting',
                ),
                array(
                    'type' => 'iconpicker',
                    'heading' => __( 'Content icon', 'js_composer' ),
                    'param_name' => 'icon_fa',
                    'value' => 'fa fa-check-square',
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
            "value"       => 33,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "description" => __("Choose heading font size as pixel. Default is 33px", "asvc"),
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
            "description" => __("Chose description font size as pixel. Default is 15px", "asvc"),
            "group"       => "Styles"
        ),
        array(
            "type"        => "colorpicker",
            "class"       => "",
            "heading"     => __( "Description Font color", "asvc" ),
            "param_name"  => "desc_color",
            "description" => __( "Choose description color", "asvc" ),
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

function tavc_info_section_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'title' => '',
        'title_hlt' => '',
        'desc' => '',
        'list_items' => '',
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
    
        
    $list_items = vc_param_group_parse_atts($list_items);
    $list_html ='';
    if ($list_items !== ''){
        $list_html .= '<div class="mt-25">
                        <ul class="primary-list">';
        foreach ($list_items as $list_item) {
            $list_html .= '<li><i class="'.$list_item['icon_fa'].'"></i>'.$list_item['list_content'].'</li>';
        }
        $list_html .='</ul>
                    </div>';
    }
    
    
    $html .= '<div class="mg-container '.$el_class.'">
            <div class="mg-row">
                <div class="mg-col-md-5 mg-col-sm-12">
                <img src="'.$image[0].'" class="rounded-border shadow-primary full-width" alt="'.$title.'">
            </div>				
            <div class="mg-col-md-7 mg-col-sm-12">
                <div class="">
                    <div class="section-heading left-holder">
                        <h3 style="'.$heading_styles.'" class="bold">'.$title.' <span class="italic libre-baskerville primary-color">'.$title_hlt.'</span></h3>
                        <div class="section-heading-line"></div>
                    </div>
                    <div class="text-content-big">
                        <p style="'.$desc_styles.'">'.$desc.'</p>
                    </div>

                    '.$list_html.'
                        			
                </div>
            </div>
            </div>
            </div>';
    

    return $html;
}

add_shortcode("tavc_info_section_v1", "tavc_info_section_v1_shortcode");