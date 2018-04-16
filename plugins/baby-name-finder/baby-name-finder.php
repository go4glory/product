<?php
/*
Plugin Name: Baby Name Finder
Plugin URI: http://pickplugins.com
Description: Create awesome baby name finder website.
Version: 1.0.0
Author: pickplugins
Author URI: http://pickplugins.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class BabyNameFinder{
	
	public function __construct(){
	
	define('baby_nf_plugin_url', WP_PLUGIN_URL . '/' . plugin_basename( dirname(__FILE__) ) . '/' );
	define('baby_nf_plugin_dir', plugin_dir_path( __FILE__ ) );
	define('baby_nf_wp_url', 'https://wordpress.org/plugins/baby-name-finder/' );
	define('baby_nf_wp_reviews', 'http://wordpress.org/support/view/plugin-reviews/baby-name-finder' );
	define('baby_nf_pro_url','http://www.pickplugins.com/item/baby-name-finder-create-baby-site-for-wordpress/' );
	define('baby_nf_demo_url', 'www.pickplugins.com/demo/baby-name-finder/' );
	define('baby_nf_conatct_url', 'http://www.pickplugins.com/contact/' );
	define('baby_nf_qa_url', 'http://www.pickplugins.com/questions/' );
	define('baby_nf_plugin_name', 'baby Board Manager' );
	define('baby_nf_plugin_version', '1.0.0' );
	define('baby_nf_customer_type', 'free' );	 // pro & free	
	define('baby_nf_share_url', 'https://wordpress.org/plugins/baby-name-finder/' );
	define('baby_nf_tutorial_video_url', '//www.youtube.com/embed/Z-ZzJiyVNJ4?rel=0' );

	// Class
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-types.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-post-meta.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php');	
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-functions.php');
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-settings.php');

				

	// Function's
	require_once( plugin_dir_path( __FILE__ ) . 'includes/functions.php');

	add_action( 'admin_enqueue_scripts', 'wp_enqueue_media' );
	add_action( 'wp_enqueue_scripts', array( $this, 'baby_nf_front_scripts' ) );
	add_action( 'admin_enqueue_scripts', array( $this, 'baby_nf_admin_scripts' ) );
	
	}
	
	public function baby_nf_install(){
		
		do_action( 'baby_nf_action_install' );
		}		
		
	public function baby_nf_uninstall(){
		
		do_action( 'baby_nf_action_uninstall' );
		}		
		
	public function baby_nf_deactivation(){
		
		do_action( 'baby_nf_action_deactivation' );
		}
		
	public function baby_nf_front_scripts(){
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-datepicker');
		
		wp_enqueue_script('baby_nf_front_js', plugins_url( '/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
			
		//wp_localize_script( 'baby_nf_front_js', 'baby_nf_ajax', array( 'baby_nf_ajaxurl' => admin_url( 'admin-ajax.php')));
		
		
		wp_enqueue_style('baby_nf_style', baby_nf_plugin_url.'css/style.css');
		//wp_enqueue_style('frontend-forms-css', baby_nf_plugin_url.'css/frontend-forms.css');
		wp_enqueue_style('font-awesome', baby_nf_plugin_url.'css/font-awesome.css');
		//wp_enqueue_style('jquery-ui', baby_nf_plugin_url.'admin/css/jquery-ui.css');
		
		//ParaAdmin
		//wp_enqueue_style('ParaAdmin', baby_nf_plugin_url.'ParaAdmin/css/ParaAdmin.css');
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));	
		
			
			
		}

	public function baby_nf_admin_scripts(){
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('baby_nf_admin_js', plugins_url( '/admin/js/scripts.js' , __FILE__ ) , array( 'jquery' ));
		//wp_localize_script( 'baby_nf_admin_js', 'baby_nf_ajax', array( 'baby_nf_ajaxurl' => admin_url( 'admin-ajax.php')));
		wp_enqueue_style('baby_nf_admin_style', baby_nf_plugin_url.'admin/css/style.css');
		//wp_enqueue_style('jquery-ui', baby_nf_plugin_url.'admin/css/jquery-ui.css');

		
		
		//ParaAdmin
		wp_enqueue_style('ParaAdmin', baby_nf_plugin_url.'ParaAdmin/css/ParaAdmin.css');		
		wp_enqueue_script('ParaAdmin', plugins_url( 'ParaAdmin/js/ParaAdmin.js' , __FILE__ ) , array( 'jquery' ));
		
		//wp_enqueue_style( 'wp-color-picker' );
		//wp_enqueue_script( 'baby_nf_color_picker', plugins_url('/admin/js/color-picker.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
		
		}
	
	
	
	
	}

new BabyNameFinder();