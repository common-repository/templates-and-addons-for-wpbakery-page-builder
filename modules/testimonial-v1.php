<?php
vc_map(array(
    "name" 			=> "Testimonial v1",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_testimonial_v1",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
        array(
            "type" => "attach_image",
            "heading" => __("User Image", "tavc"),
            "param_name" => "image",
            "value" => "",
            "description" => __("perfect size is: 74x74", "tavc")
        ),
        array(
            "type" => "textfield",
            "heading" => __("User Name", 'tavc'),
            "param_name" => "name",
            "description" => __("", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("User Designation", 'tavc'),
            "param_name" => "user_desig",
            "description" => __("ex: Financial Analyst, or leave the field blank", 'tavc')
        ),                 
        array(
            "type" => "textarea",
            "heading" => __("Content", 'tavc'),
            "param_name" => "desc",
            "description" => __("", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Rating", 'tavc'),
            "param_name" => "rating",
            "description" => __("ex: Give rating between 0-5 star", 'tavc'),
            "value"  => "4"
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
            "value"       => 18,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "description" => __("Choose heading font size as pixel. Default is 18px", "asvc"),
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
            "type"        => "colorpicker",
            "class"       => "",
            "heading"     => __( "Designation Color", "asvc" ),
            "param_name"  => "desig_color",
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

function tavc_testimonial_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'name' => '',
        'user_desig' => '',
        'desc' => '',
        'rating' => '4',
        'heading_font' => '',
        'heading_f_size' => '',
        'heading_color' => '',
        'heading_font_style' => '',
        'desc_font' => '',
        'desc_f_size' => '',
        'desc_color' => '',
        'desc_font_style' => '',        
        'desig_color' => '',        
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
    if(isset($heading_f_size)){
        $heading_styles .= ' font-size: '.$heading_f_size.'px; ';
    }    
    if(isset($heading_color)){
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
    
        
    $html_rating = '';
    switch ($rating) {
    case '1':
        $html_rating = '<i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>';
        break;
    case '2':
        $html_rating = '<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>';
        break;
    case '3':
        $html_rating = '<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>';
        break;
    case '4':
        $html_rating = '<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>';
        break; 
    case '5':
        $html_rating = '<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>';
        break;                           
    default:
       $html_rating = '<i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>';
        break;
    }
    $html .= '<div class="testmonial-box '.$el_class.'">
                    <div class="mg-row">
                        <div class="mg-col-md-2 mg-col-sm-2 pr-0">
                            <div class="testmonial-box-image">
                                <img src="'.$image[0].'" alt="">
                            </div>
                        </div>
                        <div class="mg-col-md-10 mg-col-sm-10">
                            <div class="mg-row">
                                <div class="mg-col-md-6 mg-col-sm-6 name-desig">
                                    <h5 style="'.$heading_styles.'">'.$name.'</h5>
                                    <span style="color:'.$desig_color.'">'.$user_desig.'</span>
                                </div>
                                <div class="mg-col-md-6 mg-col-sm-6 text-right">
                                    <div class="testmonial-box-rating right-holder">
                                        '.$html_rating.'
                                    </div>
                                </div>								
                            </div>
                            <p style="'.$desc_styles.'">'.$desc.'</p>
                        </div>
                    </div>
                </div>';
    

    return $html;
}

add_shortcode("tavc_testimonial_v1", "tavc_testimonial_v1_shortcode");