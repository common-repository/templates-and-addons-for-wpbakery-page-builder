<?php

vc_map( array(
    'name'                    => __( 'Slider' , 'btvc' ),
    'base'                    => 'btvc_slider',
    'category'                   => __('Templates & Addons'),
    'icon'                    => 'icon-wpb-row',
    'description'             => __( 'Container for Slider', 'btvc' ),
    'as_parent'               => array('only' => 'btvc_slider_item'), // Use only|except attributes to limit child shortcodes (separate multiple values with comma)
    'content_element'         => true,
    'show_settings_on_create' => true,
    'params'                  => array(
        /*
        array(
            "type"             =>     "textfield",
            "heading"         =>     __( 'Width', 'btvc' ),
            "param_name"     =>     "img_width",
            "description"    =>    __( 'set in pixel eg 100px or percentage eg 100% (for full container width) or leave blank', 'btvc' ),
            "group"         => 'General',
        ),
        */
        array(
            "type"             =>     "textfield",
            "heading"         =>     __( 'Slider Height', 'btvc' ),
            "param_name"     =>     "slider_height",
            "description"    =>    __( 'set in pixel eg: 500 or leave blank', 'btvc' ),
            "group"         => 'General',
        ),
        array(
            'type'             => 'prime_slider',
            'heading'          => __( 'Description Font Size', 'asvc' ),
            'param_name'       => 'desc_f_size',
            "value" => 14,
            "min" => 5,
            "max" => 100,
            "step" => 1,
            "unit" => "px",
            "description" => __("Chose Description Font Size as Pixel. Default is 14px", "asvc"),
        ),        

    ),
    "js_view" => 'VcColumnView'
) );





// Nested Element
vc_map( array(
    'name'            => __('Slider Item', 'btvc'),
    'base'            => 'btvc_slider_item',
    'description'     => __( '', 'btvc' ),
    'category'           => __('Business Template'),
    'icon'            => 'icon-wpb-row',
    'content_element' => true,
    'as_child'        => array('only' => 'btvc_slider'), // Use only|except attributes to limit parent (separate multiple values with comma)
    'params'          => array(
                
    
        array(
            "type" => "attach_image",
            "heading" => __("Slider Image", "pcvc"),
            "param_name" => "image",
            "value" => "",
            "description" => __("select image for slider", "pcvc")
        ),
        array(
            "type"             =>     "textfield",
            "heading"         =>     __( 'Slider Title', 'btvc' ),
            "param_name"     =>     "slider_title",
            "description"    =>    __( '', 'btvc' ),
            'value'          => '',
        ),        
        array(
            "type" => "textarea",
            "heading" => __("Description", "ahevc"),
            "param_name" => "description",
            "value" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et eletum nulla, eu placerat felis. Etiam tincidunt orci lacus, id varius dolor fermum sit amet.",
        ),        
        array(
            "type"             =>     "textfield",
            "heading"         =>     __( 'Button 1 Title', 'btvc' ),
            "param_name"     =>     "btn1_title",
            "description"    =>    __( 'Leave blank if you do not want', 'btvc' ),
            'value'          => '',
        ),               
        array(
            "type"             =>     "textfield",
            "heading"         =>     __( 'Button 1 URL', 'btvc' ),
            "param_name"     =>     "btn1_url",
            "description"    =>    __( 'Leave blank if you do not want', 'btvc' ),
            'value'          => '',
        ),                 
        array(
            "type"             =>     "textfield",
            "heading"         =>     __( 'Button 2 Title', 'btvc' ),
            "param_name"     =>     "btn2_title",
            "description"    =>    __( 'Leave blank if you do not want', 'btvc' ),
            'value'          => '',
        ),               
        array(
            "type"             =>     "textfield",
            "heading"         =>     __( 'Button 2 URL', 'btvc' ),
            "param_name"     =>     "btn2_url",
            "description"    =>    __( 'Leave blank if you do not want', 'btvc' ),
            'value'          => '',
        ),
    ),
) );


// Shortcode function
if(!function_exists('btvc_slider_output')){
    
    function btvc_slider_output( $atts, $content = null){
        $atts =  extract(shortcode_atts(array( 
            
            'slider_height'  => '',

            
        ),$atts )) ;
      
        
        $html = '';
        $html .= '<div class="intro-section">
                <div class="main-overly-block"></div>
                <div class="intro-carousel-slider">';
        $html .= do_shortcode( $content );
        $html .= '</div></div>';
        
        $html .= '<style>.slider-images img{
            height: '.$slider_height.'px;
            
        }</style>';
        $html .= '<div class="clearfix"></div>';
        return $html;
        
        
    }
    add_shortcode( 'btvc_slider' , 'btvc_slider_output' );
}



if(!function_exists('btvc_slider_item_output')){
    
    function btvc_slider_item_output($atts, $content = null){
        extract(shortcode_atts(array(
    
            "image" => '',
            "slider_title" => '',
            "description" => '',
            "btn1_title" => '',
            "btn1_url" => '',
            "btn2_title" => '',
            "btn2_url" => '',
            
    ), $atts));
    
        //$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content
        
        $image = wp_get_attachment_image_src( $image, 'full' );
        $html = '';
        
        $html .= '<div class="intro-content-box">
            <div class="slider-images"> <img src="'.$image[0].'" alt=""> </div>
            <div class="slider-content">
                <div class="display-table">
                    <div class="display-table-cell">
                        <div class="mg-col-md-12 mg-text-center"> 
                            <!-- layer 1 -->
                            <div class="layer-1">
                                <h1 class="title2">'.$slider_title.'</h1>
                            </div>
                            <!-- layer 2 -->
                            <div class="layer-2 ">
                                <p>'.$description.'</p>
                            </div>
                            <div class="layer-3">';
                            if ( !empty($btn1_title) && !empty($btn1_url)){
                                $html .='<a href="'.$btn1_url.'" class="ready-btn left-btn" >'.$btn1_title.'</a>'; 
                            }
                            if ( !empty($btn2_title) && !empty($btn2_url)){                            
                                $html .='<a href="'.$btn2_url.'" class="ready-btn right-btn" >'.$btn2_title.'</a>'; 
                            }
                    $html .='</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';

        return $html;
    }
    add_shortcode( 'btvc_slider_item' , 'btvc_slider_item_output' );
}


// A must for container functionality, replace Wbc_Item with your base name from mapping for parent container
if(class_exists('WPBakeryShortCodesContainer'))
{
    class WPBakeryShortCode_btvc_slider extends WPBakeryShortCodesContainer {
    }
}
// Replace Wbc_Inner_Item with your base name from mapping for nested element
if(class_exists('WPBakeryShortCode'))
{
    class WPBakeryShortCode_btvc_slider_item extends WPBakeryShortCode {
    }
}


?>