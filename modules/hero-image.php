<?php
vc_map(array(
    "name"             => "Hero Image",
    "category"         => 'Templates & Addons',
    "description"       => "hero image with particle effect",
    "base"             => "tavc_hero_image",
    "class"             => "",
    "icon"             => "tavc_icon",
    
    "params"     => array(
        array(
            "type" => "attach_image",
            "heading" => __("Slider Image", "tavc"),
            "param_name" => "image",
            "value" => "",
            "description" => __("select image for slider", "tavc")
        ),
        array(
            "type" => "textfield",
            "heading" => __("Heading", 'tavc'),
            "param_name" => "title",
            "description" => __("", 'tavc')
        ),
        array(
            'type' => 'checkbox',
            'heading' => __( 'Use Animated Text?', 'js_composer' ),
            'param_name' => 'enable_anim',
        ),        
        array(
            'type' => 'param_group',
            'heading' => __( 'Animated Text', 'js_composer' ),
            'param_name' => 'animated_texts',
            'dependency' => array(
                'element' => 'enable_anim',
                'value' => 'true',
            ),
            
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Text', 'js_composer' ),
                    'param_name' => 'text',
                    'description' => __( 'Click + button to add more', 'js_composer' ),
                    'value' => 'Business',
                ),              
            ),
        ),        
        array(
            "type" => "textarea",
            "heading" => __("Description", 'tavc'),
            "param_name" => "desc",
            "description" => __("", 'tavc')
        ),        
        array(
            "type" => "textfield",
            "heading" => __("Button 1 Text", 'tavc'),
            "param_name" => "btn1_text",
            "description" => __("Leave blank for no button", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button 1 URL", 'tavc'),
            "param_name" => "btn1_url",
            "description" => __("keep blank if dont need", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button 2 Text", 'tavc'),
            "param_name" => "btn2_text",
            "description" => __("Leave blank for no button", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button 2 URL", 'tavc'),
            "param_name" => "btn2_url",
            "description" => __("keep blank if dont need", 'tavc')
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
            "value"       => 66,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "description" => __("Choose heading font size as pixel. Default is 66px", "asvc"),
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
            "value"       => 18,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "description" => __("Chose description font size as pixel. Default is 14px", "asvc"),
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

function tavc_hero_image_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'title' => '',
        'enable_anim' => 'false',
        'animated_texts' => '',
        'desc' => '',
        'btn1_text' => '',
        'btn2_text' => '',
        'btn1_url' => '',
        'btn2_url' => '',
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

    //$image_url = wp_get_attachment_url( $image, 'full' );
    //$image = aq_resize( $image_url, 296, 289, false ); //resize & crop the image
    //var_dump($image);    
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
    
    
        
        
    $animated_texts = vc_param_group_parse_atts($animated_texts);
    
    $animate_html ='';
    if ($enable_anim == true && $animated_texts != ''){
        $animate_html .= '<span class="cd-words-wrapper">';
        $i = 0;
        foreach ($animated_texts as $animated_text) {
            if ($i == 0){
                $class = 'is-visible';
            }else{
                $class = '';
            }
            $animate_html .= '<b style="'.$heading_styles.'" class="'.$class.'">'.$animated_text['text'].'</b>';
            $i++;
        }
        $animate_html .='</span>';

    }else{
        $animate_html = '';
    }
    
    $btn1_html = '';
    if (!empty($btn1_text)){
        $btn1_html = '<a href="'.$btn1_url.'" class="primary-button semi-rounded button-md w-200">'.$btn1_text.'</a>';
    }
    
    $btn2_html = '';
    if (!empty($btn2_text)){
        $btn2_html = '<a href="'.$btn2_url.'" class="white-button-bordered semi-rounded button-md w-200">'.$btn2_text.'</a>';
    }
            
    $html .= '<style>#tavc-hero.particle-bg {
                background-image: url('.$image[0].');
                background-size: cover;
            }</style>';
    
    $html .= '<div id="tavc-hero" class="particle-bg">

            <div id="particles-js"></div>
            <div class="tavc-header-text-area">
                <div class="tavc-header-text-content">
                    <div class="mg-container">
                        <div class="mg-row">
                            <div class="mg-col-md-8 mg-col-md-offset-2 mg-col-sm-10 mg-col-sm-offset-1 mg-col-xs-12">
                                <div id="header-text" class="tavc-header-text text-center">
                                    <h2 style="'.$heading_styles.'" class="cd-headline rotate-1 large-heading mobile-heading">
                                        <span>'.$title.'</span>
                                        '.$animate_html.'
                                    </h2>
                                    <p style="'.$desc_styles.'">'.$desc.'</p>
                                    '.$btn1_html.'
                                    '.$btn2_html.'
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    

    return $html;
}

add_shortcode("tavc_hero_image", "tavc_hero_image_shortcode");

/*
add_action( 'vc_load_default_templates_action','creative_template_for_vc' ); // Hook in
 
function creative_template_for_vc() {
    $data                   = array(); 
    $data['name']           = __( 'Home Business', 'vcmegapack' );
    $data['weight']         = 0; 
    $data['image_path']     = plugins_url( 'assets/img/templates/e.png', __FILE__ );//Thumbnail should have this dimensions: 114x154px
    $data['custom_class']     = 'creative_template_for_vc_custom_template';
    $data['content']        = '[vc_row full_width="stretch_row_content_no_spaces"][vc_column][tavc_hero_image image="405" enable_anim="true" title="We Create" animated_texts="%5B%7B%22text%22%3A%22Business%22%7D%2C%7B%22text%22%3A%22Solution%22%7D%2C%7B%22text%22%3A%22Finance%22%7D%5D" desc="Create your brand new powerful website beautifully." btn1_url="#" btn1_text="Read More"][/vc_column][/vc_row][vc_row][vc_column][tavc_service_v1][/vc_column][/vc_row][vc_row][vc_column width="1/3"][tavc_clients_carousel_v1 client_images="%5B%7B%7D%5D"][/vc_column][vc_column width="1/3"][tavc_clients_carousel_v1 client_images="%5B%7B%7D%5D"][/vc_column][vc_column width="1/3"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][tavc_contact_section_v1 contact_form="369" contact_infos="%5B%7B%22icon%22%3A%22fa%20fa-adjust%22%7D%5D"][/vc_column][vc_column width="1/2"][tavc_contact_section_v1 contact_form="369" contact_infos="%5B%7B%22icon%22%3A%22fa%20fa-adjust%22%7D%5D"][/vc_column][/vc_row][vc_row][vc_column][tavc_latest_post_carousel][/vc_column][/vc_row]';
  
    vc_add_default_templates( $data );
}
*/