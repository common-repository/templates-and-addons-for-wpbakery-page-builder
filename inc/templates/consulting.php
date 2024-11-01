<?php

/****************************************************************/
/************************ CONSULTING ******************************/
/****************************************************************/


add_action( 'vc_load_default_templates_action','consulting_template_for_vc' ); // Hook in
 
function consulting_template_for_vc() {
    $data               	= array(); 
    $data['name']       	= __( 'Consulting Template (Pro Only)', 'tavc' );
    $data['weight']     	= 0; 
    $data['image_path'] 	= plugins_url( 'assets/img/templates/e.png', __FILE__ );//Thumbnail should have this dimensions: 114x154px
    $data['custom_class'] 	= 'consulting_template_for_vc_custom_template';
    
    
    $data['content']    	= '[vc_row][vc_column][vc_raw_html]JTNDaDMlMjBhbGlnbiUzRCUyMmNlbnRlciUyMiUzRVRoaXMlMjBpcyUyMG9ubHklMjBmb3IlMjBwcm8lMjB2ZXJzaW9uLiUyMFBsZWFzZSUyMHB1cmNoYXNlJTIwdGhlJTIwcHJvJTIwdmVyc2lvbiUyMGhlcmUlMjAlM0NiciUzRSUyMCUzQ2ElMjB0YXJnZXQlM0QlMjJfYmxhbmslMjIlMjBocmVmJTNEJTIyaHR0cHMlM0ElMkYlMkZjb2RlbnB5LmNvbSUyRml0ZW0lMkZ0ZW1wbGF0ZXMtYW5kLWFkZG9ucy1mb3Itd3BiYWtlcnktcGFnZS1idWlsZGVyJTJGJTIyJTNFVGVtcGxhdGVzJTIwYW5kJTIwQWRkb25zJTIwZm9yJTIwV1BCYWtlcnklMjBQYWdlJTIwQnVpbGRlciUyMFBybyUzQyUyRmElM0UlMjAtJTIwZm9yJTIwb25seSUyMCUyNDEzJTNDJTJGaDMlM0U=[/vc_raw_html][/vc_column][/vc_row]';

  
    vc_add_default_templates( $data );
}