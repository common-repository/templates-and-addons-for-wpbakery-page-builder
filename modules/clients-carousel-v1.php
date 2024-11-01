<?php
vc_map(array(
    "name" 			=> "Clients Carousel v1",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_clients_carousel_v1",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
        array(
            'type' => 'param_group',
            'heading' => __( 'Clients Images', 'js_composer' ),
            'param_name' => 'client_images',
            
            'params' => array(
                array(
                    "type" => "attach_image",
                    "heading" => __("Image", "tavc"),
                    "param_name" => "image",
                    "value" => "",
                    "description" => __("perfect size is: 125x40", "tavc")
                ),
            ),
        ),             
        
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Extra class name", 'tavc'),
            "param_name" => "el_class",
            "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'tavc')
        ),        

    )
    
));

function tavc_clients_carousel_v1_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'client_images' => '',
        'el_class' =>'',

    ), $atts));    
    
    
    $html = '';      
    
    $client_images = vc_param_group_parse_atts($client_images);
    $client_html ='';
    if ($client_images !== ''){
        foreach ($client_images as $client_image) {
            $image = wp_get_attachment_image_src( $client_image['image'], 'full' );
            $client_html .= '<div class="item">
                	<img src="'.$image[0].'" alt="">  
                </div>';
        }
    }
    
    
    $html .= '<div class="owl-carousel owl-theme clients '.$el_class.'" id="tavc-clients">
                '.$client_html.'	         
            </div>';
    

    return $html;
}

add_shortcode("tavc_clients_carousel_v1", "tavc_clients_carousel_v1_shortcode");