<?php

/*
* @Author 		ParaTheme
* @Folder	 	baby-name-finder/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_baby_nf_shortcodes{
	
    public function __construct(){
		
		add_shortcode( 'baby_name_list', array( $this, 'baby_nf_baby_list_display' ) );

   		}
		
		

	public function baby_nf_baby_list_display($atts, $content = null ) {
			$atts = shortcode_atts(
				array(
					'themes' => 'flat',
					'meta_keys' => '',				
					'max_item' => '',
												
					), $atts);
	
			$html = '';
			$baby_nf_themes = $atts['themes'];
			
			$meta_keys = $atts['meta_keys'];			
			$max_item = $atts['max_item'];			
			
			
						
			//$baby_nf_themes = get_post_meta( $post_id, 'baby_nf_themes', true );
			//$baby_nf_license_key = get_option('baby_nf_license_key');
			
/*
			if(empty($baby_nf_license_key))
				{
					return '<b>"'.baby_nf_plugin_name.'" Error:</b> Please activate your license.';
				}

*/
			
			$class_baby_nf_functions = new class_baby_nf_functions();
			$baby_nf_babylist_themes_dir = $class_baby_nf_functions->baby_nf_babylist_themes_dir();
			$baby_nf_babylist_themes_url = $class_baby_nf_functions->baby_nf_babylist_themes_url();

			
			
			echo '<link  type="text/css" media="all" rel="stylesheet"  href="'.$baby_nf_babylist_themes_url[$baby_nf_themes].'/style.css" >';				

			include $baby_nf_babylist_themes_dir[$baby_nf_themes].'/index.php';				

			return $html;
	
	
		}
		


	
			
	}
	
	new class_baby_nf_shortcodes();