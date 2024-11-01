<?php


vc_map(array(
    "name" 			=> "Latest Post v3",
    "category" 		=> 'Templates & Addons',
    "description"	=> "",
    "base" 			=> "tavc_latest_post_grid_v3",
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

function tavc_latest_post_grid_v3_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'el_class' =>'',

    ), $atts));    
    
    global $post;
    
    $html = '';      
    	
    $args1 = array(
        //'numberposts' => 1,
        'posts_per_page' => 1,
        'offset' => 0,
        'category' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true 
    );
    
    
    
    
    $html .= '<div class="row mt-30 '.$el_class.'">';
    
    $post_query_1 = new WP_Query( $args1 );
    while ($post_query_1 -> have_posts()) : $post_query_1 -> the_post();

        $featured_image_1 = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'full' );
        
        
        $excerpt_1 = get_the_content();
        
        $html .= '<div class="col-md-6 col-sm-12 col-12">
                <div class="blog-news">
                    <div class="blog-news-img">
                        <img src="'.$featured_image_1.'" alt="'.get_the_title().'">
                    </div>
                    <div class="blog-news-text">
                        <h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
                        <p>'.wp_trim_words( $excerpt_1 , '18' ).'</p>
                        <div class="blog-news-comment">
                            <p>Posted </p><span>'.get_the_date().'</span>
                        </div>
                    </div>
                </div>
            </div>';
            
        endwhile;
        wp_reset_postdata();    

        //query two
        $args2 = array(
            'posts_per_page' => 2,
            'offset' => 1,
            'category' => 0,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'post',
            'post_status' => 'publish',
            'suppress_filters' => true 
        );
        
        $post_query_2 = new WP_Query( $args2 );
        while ($post_query_2 -> have_posts()) : $post_query_2 -> the_post();
        
        $featured_image_2 = wp_get_attachment_url( get_post_thumbnail_id($post->ID),'full' );
        
        
        $excerpt_2 = get_the_content();
        
        $html .= '<div class="col-md-6 col-sm-12 col-12">
                <div class="blog-news mt-30">
                    <div class="row">
                        <div class="col-md-5 col-sm-5 col-12">
                            <div class="blog-news-left-img">
                                <img style="height: 230px" src="'.$featured_image_2.'" alt="'.get_the_title().'">
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-7 col-12">
                            <div class="blog-news-left-text">
                                <h4><a href="'.get_the_permalink().'">'.get_the_title().'</a></h4>
                                <p>'.wp_trim_words( $excerpt_2 , '15' ).'</p>
                                <div class="blog-news-comment">
                                    <p>Posted </p><span>'.get_the_date().'</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        ';
           
    
        endwhile;
        wp_reset_postdata();               
        $html .='</div>';
    return $html;
}

add_shortcode("tavc_latest_post_grid_v3", "tavc_latest_post_grid_v3_shortcode");