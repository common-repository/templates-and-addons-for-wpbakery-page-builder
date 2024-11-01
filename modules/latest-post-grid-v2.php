<?php
vc_map(array(
    "name" 			=> "Latest Post Grid v2",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_latest_post_grid_v2",
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

function tavc_latest_post_grid_v2_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'el_class' =>'',

    ), $atts));    
    
    global $post;
    
    $html = '';      
    	
    $args = array(
        'posts_per_page' => 3,
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

        $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'full' );
        
        $html .= '<div class="mg-col-md-4 mg-col-sm-4 '.$el_class.'">
            <div class="blog-grid-2">
                <div class="blog-grid-img">
                    <img src="'.$featured_image.'" alt="">
                </div>
                <div class="blog-grid-text">
                    <h4>'.get_the_title().'</h4>
                    <ul>
                        <li><i class="fa fa-calendar"></i>'.get_the_date().'</li>
                        <li><i class="fa fa-comments"></i>Comments ('.get_comments_number().')</li>
                    </ul>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard.</p>
                    <div class="blog-grid-2-button left-holder">
                        <a href="'.get_the_permalink().'">Continue Reading <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>';
           
    endwhile;
    wp_reset_postdata();       

    return $html;
}

add_shortcode("tavc_latest_post_grid_v2", "tavc_latest_post_grid_v2_shortcode");