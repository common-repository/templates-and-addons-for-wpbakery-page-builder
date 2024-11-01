<?php
vc_map(array(
    "name"             => "Counter v3",
    "category"         => 'Templates & Addons',
    "description"    => "counter with percent",
    "base"             => "tavc_counter_v3",
    "class"         => "",
    "icon"             => "tavc_icon",
    
    "params"     => array(
        array(
            "type" => "textfield",
            "heading" => __("Title", 'tavc'),
            "param_name" => "title",
            "description" => __("", 'tavc')
        ),
        array(
            "type" => "textfield",
            "heading" => __("Count Number", 'tavc'),
            "param_name" => "count_num",
            "description" => __("", 'tavc')
        ),                       
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Extra class name", 'tavc'),
            "param_name" => "el_class",
            "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'tavc')
        ),        

    )
    
));

function tavc_counter_v3_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'title' => '',
        'count_num' => '',
        'el_class' =>'',

    ), $atts));    
    
    $html = '';
    
    $html .= '<div class="countup-box-2 '.$el_class.'">
                    <h3 class="countup">'.$count_num.'</h3><span>%</span>
                    <h5>'.$title.'</h5>									
                </div>';
    

    return $html;
}

add_shortcode("tavc_counter_v3", "tavc_counter_v3_shortcode");