<?php
/*
Plugin Name: Business Template Blocks for WPBakery Page Builder
Plugin URI: https://codenpy.com/item/amazing-hover-effects-for-wpbakery-page-builder/
Description: Awesome way to show your features inside wpbakery page builder with various styles with unlimited colors.
Author: themebon
Author URI: http://codenpy.com/
License: GPLv2 or later
Text Domain: tavc
Version: 1.3.2
*/

// Don't load directly
if (!defined('ABSPATH')){die('-1');}


include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active( 'js_composer/js_composer.php' ) ){

    /* Constants */
    define( 'TAVC_URL', rtrim( plugin_dir_url( __FILE__ ), '/' ) );
    define( 'TAVC_DIR', rtrim( plugin_dir_path( __FILE__ ), '/' ) );
    if ( ! function_exists( 'btvc_WordPressCheckup' ) ) {
        function btvc_WordPressCheckup( $version = '3.8' ) {
            global $wp_version;
            if ( version_compare( $wp_version, $version, '>=' ) ) {
                return "true";
            } else {
                return "false";
            }
        }
    }
    /*
    if(!function_exists('aq_resize')){
        require_once('inc/aq_resizer.php');
    }
    */
    require_once ('inc/framework/cs-framework.php');
    require_once ('inc/dynamic-css.php');
    require_once ('inc/google-fonts.php');

    //Loading CSS
    function btvc_business_template_styles() {

        // CSS
        wp_enqueue_style('btvc-grid', plugins_url( '/assets/css/grid.css' , __FILE__ ) );
        wp_enqueue_style('btvc-font-awesome', plugins_url( '/assets/css/font-awesome.min.css' , __FILE__ ) );
        wp_enqueue_style('btvc-animate', plugins_url( '/assets/css/animate.css' , __FILE__ ) );
        wp_enqueue_style('btvc-animated-headlines', plugins_url( '/assets/css/animated-headlines.css' , __FILE__ ) );
        wp_enqueue_style('btvc-owl-carousel', plugins_url( '/assets/css/owl.carousel.css' , __FILE__ ) );
        wp_enqueue_style('btvc-izmodal', plugins_url( '/assets/css/izmodal.css' , __FILE__ ) );
        wp_enqueue_style('btvc-style', plugins_url( '/assets/css/styles.css' , __FILE__ ) );
        wp_enqueue_style('btvc-custom', plugins_url( '/assets/css/custom.css' , __FILE__ ) );
        wp_enqueue_style('btvc-responsive', plugins_url( '/assets/css/responsive.css' , __FILE__ ) );

        // JS
        wp_enqueue_script('btvc-plugins-js', plugins_url('/assets/js/plugins.js', __FILE__), array('jquery'),'1.0.0', true);
        wp_enqueue_script('btvc-animated-headlines-js', plugins_url('/assets/js/animated-headlines.js', __FILE__), array('jquery'),'1.0.0', true);
        wp_enqueue_script('btvc-app-js', plugins_url('/assets/js/app.js', __FILE__), array('jquery'),'1.0.0', true);
        wp_enqueue_script('btvc-custom-js', plugins_url('/assets/js/custom.js', __FILE__), array('jquery'),'1.0.0', true);


    }
    add_action( 'wp_enqueue_scripts', 'btvc_business_template_styles' );

    // Admin Style CSS
    function btvc_admin_enqeue() {

        wp_enqueue_style( 'btvc_admin_css', plugins_url( 'admin/admin.css', __FILE__ ) );
    }
    add_action( 'admin_enqueue_scripts', 'btvc_admin_enqeue' );

    // Initialize templates and addons addon
    add_action( 'vc_before_init', 'init_btvc_addon' );
    function init_btvc_addon() {
        //params
        require_once 'admin/params/index.php';

        //Business Template
        require_once( 'modules/hero-image.php' );
        require_once( 'modules/service-v1.php' );
        require_once( 'modules/info-section-v1.php' );
        require_once( 'modules/parallax-section.php' );
        require_once( 'modules/heading.php' );
        require_once( 'modules/service-v2.php' );
        require_once( 'modules/testimonial-v1.php' );
        require_once( 'modules/counter-v1.php' );
        require_once( 'modules/team-member-v1.php' );
        require_once( 'modules/clients-carousel-v1.php' );
        require_once( 'modules/contact-section-v1.php' );
        require_once( 'modules/latest-post-v1.php' );
        require_once( 'modules/call-to-action-v1.php' );


        //Consulting Template
        require_once( 'modules/process-steps-v1.php' );
        require_once( 'modules/progress-bar-v1.php' );
        require_once( 'modules/counter-v2.php' );
        require_once( 'modules/service-v3.php' );
        require_once( 'modules/pricing-table-v1.php' );
        require_once( 'modules/latest-post-grid-v2.php' );
        require_once( 'modules/callback-section-v1.php' );

        //Corporate Template
        require_once( 'modules/features-section-v1.php' );
        require_once( 'modules/info-section-v2.php' );
        require_once( 'modules/service-v4.php' );
        require_once( 'modules/accordion-v1.php' );
        require_once( 'modules/contact-form-v1.php' );
        require_once( 'modules/parallax-section-v2.php' );
        require_once( 'modules/team-member-v2.php' );

        //Finance Template
        require_once( 'modules/features-section-v2.php' );
        require_once( 'modules/service-v5.php' );
        require_once( 'modules/video-box-v1.php' );
        require_once( 'modules/testimonial-section-v1.php' );
        require_once( 'modules/team-member-v3.php' );

        //Marketing Template
        require_once( 'modules/features-section-v3.php' );
        //require_once( 'modules/counter-v3.php' );
        require_once( 'modules/single-testimonial.php' );
        require_once( 'modules/pricing-table-v2.php' );
        require_once( 'modules/latest-post-v3.php' );





        //Loading Templates
        require_once( 'inc/templates/business.php' );
        require_once( 'inc/templates/consulting.php' );
        require_once( 'inc/templates/corporate.php' );
        require_once( 'inc/templates/finance.php' );
        require_once( 'inc/templates/marketing.php' );

    }
}
// Check If VC is activate
else {
    function btvc_required_plugin() {
        if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'js_composer/js_composer.php' ) ) {
            add_action( 'admin_notices', 'btvc_required_plugin_notice' );

            deactivate_plugins( plugin_basename( __FILE__ ) );

            if ( isset( $_GET['activate'] ) ) {
                unset( $_GET['activate'] );
            }
        }

    }
    add_action( 'admin_init', 'btvc_required_plugin' );

    function btvc_required_plugin_notice(){
        ?><div class="error"><p>Error! you need to install or activate the <a target="_blank" href="https://codecanyon.net/item/visual-composer-page-builder-for-wordpress/242431?ref=themebonwp">WPBakery Page Builder for WordPress (formerly Visual Composer)</a> plugin to run "<span style="font-weight: bold;">Templates and Addons for WPBakery Page Builder</span>" plugin.</p></div><?php
    }
}
?>