<?php

/*
* @Author 		ParaTheme
* @Folder	 	baby-name-finder/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 


class class_baby_nf_settings  {
	
	
    public function __construct(){

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 12 );
    }
	

	
	
	public function admin_menu() {
		
		add_submenu_page( 'edit.php?post_type=baby_name', __( 'Settings', 'baby_nf' ), __( 'Settings', 'baby_nf' ), 'manage_options', 'baby_nf-settings', array( $this, 'settings_page' ) );
		//add_submenu_page( 'edit.php?post_type=baby_name', __( 'Help', 'baby_nf' ), __( 'Help', 'baby_nf' ), 'manage_options', 'baby_nf-help', array( $this, 'help_page' ) );		
		
		
		//add_submenu_page( 'edit.php?post_type=baby_name', __( 'Addons', 'baby_nf' ), __( 'Addons', 'baby_nf' ), 'manage_options', 'baby_nf_addons', array( $this, 'addons_page' ) );
		
		//add_submenu_page( 'edit.php?post_type=baby_name', __( 'Emails Templates', 'baby_nf' ), __( 'Emails Templates', 'baby_nf' ), 'manage_options', 'emails_templates', array( $this, 'emails_templates' ) );		
		
		
		
		do_action( 'baby_nf_action_admin_menus' );
		
	}
	
	public function settings_page(){
		
		include( 'menu/settings.php' );
		}
	
	public function help_page(){
		
		include( 'menu/help.php' );
		}	
	
	

	public function addons_page(){
		
		include( 'menu/addons.php' );
		}
	
	
	public function emails_templates(){
		
		include( 'menu/emails-templates.php' );
		}	
	
	
	

	}


new class_baby_nf_settings();

