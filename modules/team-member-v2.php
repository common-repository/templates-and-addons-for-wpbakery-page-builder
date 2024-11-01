<?php
vc_map(array(
    "name" 			=> "Team Member v2",
    "category" 		=> 'Templates & Addons',
    "description"	=> "Team member with carousel",
    "base" 			=> "tavc_team_member_v2",
    "class" 		=> "",
    "icon" 			=> "tavc_icon",
    
    "params" 	=> array(
    
        array(
            'type' => 'param_group',
            'heading' => __( 'Team Members Group', 'js_composer' ),
            'param_name' => 'team_groups',
            'params' => array(
                array(
                    "type" => "attach_image",
                    "heading" => __("Member Image", "tavc"),
                    "param_name" => "image",
                    "value" => "",
                    "description" => __("perfect size is: 262x288", "tavc")
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Member Name", 'tavc'),
                    "param_name" => "name",
                    "description" => __("", 'tavc')
                ),                
                array(
                    "type" => "textfield",
                    "heading" => __("Member Designation", 'tavc'),
                    "param_name" => "designation",
                    "description" => __("ex: Developer", 'tavc')
                ),
                array(
                    "type" => "textarea",
                    "heading" => __("Description", 'tavc'),
                    "param_name" => "desc",
                    "description" => __("", 'tavc')
                ),                        
                array(
                    "type" => "textfield",
                    "heading" => __("Facebbok URL", 'tavc'),
                    "param_name" => "facebook",
                    "description" => __("keep blank if you do not want", 'tavc'),
                ),                                      
                array(
                    "type" => "textfield",
                    "heading" => __("Twitter URL", 'tavc'),
                    "param_name" => "twitter",
                    "description" => __("keep blank if you do not want", 'tavc'),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Pinterest URL", 'tavc'),
                    "param_name" => "pinterest",
                    "description" => __("keep blank if you do not want", 'tavc'),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Instagram URL", 'tavc'),
                    "param_name" => "instagram",
                    "description" => __("keep blank if you do not want", 'tavc'),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Linkedin URL", 'tavc'),
                    "param_name" => "linkedin",
                    "description" => __("keep blank if you do not want", 'tavc'),
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Google+ URL", 'tavc'),
                    "param_name" => "googleplus",
                    "description" => __("keep blank if you do not want", 'tavc'),
                ),
            ),
        ),    
        array(
            "type" => "dropdown",
            "holder" => "",
            "class" => "",
            "heading" => __("Name Font", "asvc"),
            "param_name" => "heading_font",
            "value" => tavc_google_font(),
            //"std" => 'Advent+Pro',
            'group' => 'Styles',
        ),
        array(
            'type'        => 'prime_slider',
            'heading'     => __( 'Name Font Size', 'asvc' ),
            'param_name'  => 'heading_f_size',
            "value"       => 21,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "group"       => "Styles"
        ),
        array(
            "type"        => "colorpicker",
            "class"       => "",
            "heading"     => __( "Name Font color", "asvc" ),
            "param_name"  => "heading_color",
            "group"       => "Styles"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Name Font Style", "asvc"),
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
            "value"       => 14,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "group"       => "Styles"
        ),
        array(
            "type"        => "colorpicker",
            "class"       => "",
            "heading"     => __( "Description Font color", "asvc" ),
            "param_name"  => "desc_color",
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
            'type'        => 'prime_slider',
            'heading'     => __( 'Social Icons Size', 'asvc' ),
            'param_name'  => 'icons_size',
            "value"       => 15,
            "min"         => 0,
            "max"         => 100,
            "step"        => 1,
            "unit"        => "px",
            "group"       => "Styles"
        ),        
        array(
            "type"        => "colorpicker",
            "class"       => "",
            "heading"     => __( "Social Icons color", "asvc" ),
            "param_name"  => "icons_color",
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

function tavc_team_member_v2_shortcode($atts, $content = null) {
    extract(shortcode_atts(array(
    
        'team_groups' => '',
        'heading_font' => '',
        'heading_f_size' => '',
        'heading_color' => '',
        'heading_font_style' => '',
        'desc_font' => '',
        'desc_f_size' => '',
        'desc_color' => '',
        'desc_font_style' => '',        
        'icons_size' => '',        
        'icons_color' => '',        
        'el_class' =>'',

    ), $atts));    
    
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
    
    if (!empty($icons_size) || !empty($icons_color)){
        $html .= '<style>.team-block-text ul li a i {
                    font-size: '.$icons_size.'px;
                    color: '.$icons_color.';
                }</style>';
    }    
    
    
    $team_groups = vc_param_group_parse_atts($team_groups);
    $team_html ='';
    if ($team_groups !== ''){
        $team_html .= '<div class="owl-carousel owl-theme '.$el_class.'" id="team-block">';
        foreach ($team_groups as $team_group) {
            $social_links ='';
            $image = wp_get_attachment_image_src( $team_group['image'], 'full' );
            $name = $team_group['name'];
            $designation = $team_group['designation'];
            $desc = $team_group['desc'];
            
            $facebook = !empty($team_group['facebook']) ? $team_group['facebook'] : '';
            $twitter = !empty($team_group['twitter']) ? $team_group['twitter'] : '';
            $linkedin = !empty($team_group['linkedin']) ? $team_group['linkedin'] : '';
            $googleplus = !empty($team_group['googleplus']) ? $team_group['googleplus'] : '';
            $instagram = !empty($team_group['instagram']) ? $team_group['instagram'] : '';
            $pinterest = !empty($team_group['pinterest']) ? $team_group['pinterest'] : '';
            
            
            if ( !empty( $facebook ) ) {
                $social_links .='<li><a href="'.$facebook.'"><i class="fa fa-facebook"></i></a></li>'; 
            }
            if ( !empty( $twitter ) ) {
                $social_links .='<li><a href="'.$twitter.'"><i class="fa fa-twitter"></i></a></li>';                  }
            if ( !empty( $linkedin ) ) {
                $social_links .='<li><a href="'.$linkedin.'"><i class="fa fa-linkedin"></i></a></li>';                }    
            if ( !empty( $googleplus ) ) {
                $social_links .='<li><a href="'.$googleplus.'"><i class="fa fa-google-plus"></i></a></li>';           }                
            if ( !empty( $instagram ) ) {
                $social_links .='<li><a href="'.$instagram.'"><i class="fa fa-instagram"></i></a></li>';              }
            if ( !empty( $pinterest ) ) {
                $social_links .='<li><a href="'.$pinterest.'"><i class="fa fa-pinterest-p"></i></a></li>';            }            
        
            $team_html .= '<div class="team-block">
                    <div class="mg-row">
                        <div class="mg-col-md-6 mg-col-sm-6">
                            <div class="team-block-text">
                                <h4 style="'.$heading_styles.'">'.$name.'</h4>
                                <h6 class="italic libre-baskerville">'.$designation.'</h6>
                                <p style="'.$desc_styles.'">'.$desc.'</p>
                                <ul>
                                '.$social_links.'
                                </ul>
                            </div>
                        </div>
                        <div class="mg-col-md-6 mg-col-sm-6">
                            <div class="team-block-img">
                                <img src="'.$image[0].'" alt="">
                            </div>
                        </div>
                    </div>
                </div>';
        }
        $team_html .='</div>';
    }              
    
    
    $html .= $team_html;
    

    return $html;
}

add_shortcode("tavc_team_member_v2", "tavc_team_member_v2_shortcode");