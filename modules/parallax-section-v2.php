<?php
vc_map(array(
    "name" 			=> "Parallax Section v2",
    "category" 		=> 'Templates & Addons',
    "description"	=> "Parallax with video popup",
    "base" 			=> "tavc_parallax_section_v2",
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
            "type" => "textfield",
            "heading" => __("Youtube Video Embed URL", 'tavc'),
            "param_name" => "yt_url",
            "description" => __("ex: https://www.youtube.com/embed/nrJtHemSPW4", 'tavc')
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
            "value"       => 41,
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

function tavc_parallax_section_v2_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'image' => '',
        'title' => '',
        'yt_url' => '',
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
    
        
    $html .= '<div class="section-block-parallax jarallax black-overlay-10 vertical-center '.$el_class.'" data-jarallax data-speed="0.6" style="background-image: url('.$image[0].')">
        <div class="container">
            <div class="large-heading center-holder">
                <h3 style="'.$heading_styles.'" class="white-color">'.$title.'</h3>
                <div class="section-heading-line"></div>
            </div>
            <div class="video-button-sm center-holder mt-25">
            	<button class="video-video-play-icon" data-izimodal-open=".izimodal">
            		<i class="fa fa-play"></i>
            	</button>
            </div>
            <div class="izimodal" data-iziModal-width="800px" data-iziModal-fullscreen="true">
                <iframe height="515" src="'.$yt_url.'" class="full-width shadow-primary"></iframe>
            </div>		
        </div>
    </div>';
    

    return $html;
}

add_shortcode("tavc_parallax_section_v2", "tavc_parallax_section_v2_shortcode");