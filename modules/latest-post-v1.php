<?php
vc_map(array(
    "name" 			=> "Latest Post Carousel",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_latest_post_carousel",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(               
        array(
            "type" => "textfield",
            "heading" => esc_attr__("Extra class name", 'tavc'),
            "param_name" => "el_class",
            "description" => esc_attr__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'tavc')
        ),        

    )
    
));

function tavc_latest_post_carousel_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'el_class' =>'',

    ), $atts));    
    
    $html = '';      
    
    $html .= '<div class="owl-carousel owl-theme owl-loaded owl-drag '.$el_class.'" id="blog-grid-simple">';
    	
    $args = array(
        'posts_per_page' => 6,
        'offset' => 0,
        'category' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true 
    );
    
    $post_query = new WP_Query( $args );
    
    while ($post_query -> have_posts()) : $post_query -> the_post();

    
    
            $html .= '<div class="blog-grid-simple">
                <h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
                <p>'.get_the_excerpt().'</p>
                <div class="blog-grid-simple-content">
                    <div class="blog-grid-simple-date">
                        <div class="mg-row">
                            <div class="mg-col-md-2 mg-col-sm-2 pr-0">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="mg-col-md-5 mg-col-sm-5 pl-0">
                                <h5>'.get_the_date().'</h5>
                            </div>
                            <div class="mg-col-md-5 mg-col-sm-5 right-holder">
                                <a href="'.get_the_permalink().'">Read More</a><i class="fa fa-angle-right"></i>
                            </div>								
                        </div>	
                    </div>
                </div>
           </div>';
           
    endwhile;
    wp_reset_postdata();       
                
    $html .= '</div>';
    

    return $html;
}

add_shortcode("tavc_latest_post_carousel", "tavc_latest_post_carousel_shortcode");