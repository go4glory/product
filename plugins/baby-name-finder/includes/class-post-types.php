<?php

/*
* @Author 		ParaTheme
* @Folder	 	baby-name-finder/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_baby_nf_post_types{
	
	public function __construct(){
		
		add_action( 'init', array( $this, 'baby_nf_posttype_baby' ), 0 );
		
		}
	
	public function baby_nf_posttype_baby(){
		if ( post_type_exists( "baby_name" ) )
		return;

		$singular  = __( 'Baby Name', 'baby_nf' );
		$plural    = __( 'Babies Name', 'baby_nf' );
	 
	 
		register_post_type( "baby_name",
			apply_filters( "register_post_type_baby", array(
				'labels' => array(
					'name' 					=> $plural,
					'singular_name' 		=> $singular,
					'menu_name'             => __( $singular, 'baby_nf' ),
					'all_items'             => sprintf( __( 'All %s', 'baby_nf' ), $plural ),
					'add_new' 				=> __( 'Add '.$singular, 'baby_nf' ),
					'add_new_item' 			=> sprintf( __( 'Add %s', 'baby_nf' ), $singular ),
					'edit' 					=> __( 'Edit', 'baby_nf' ),
					'edit_item' 			=> sprintf( __( 'Edit %s', 'baby_nf' ), $singular ),
					'new_item' 				=> sprintf( __( 'New %s', 'baby_nf' ), $singular ),
					'view' 					=> sprintf( __( 'View %s', 'baby_nf' ), $singular ),
					'view_item' 			=> sprintf( __( 'View %s', 'baby_nf' ), $singular ),
					'search_items' 			=> sprintf( __( 'Search %s', 'baby_nf' ), $plural ),
					'not_found' 			=> sprintf( __( 'No %s found', 'baby_nf' ), $plural ),
					'not_found_in_trash' 	=> sprintf( __( 'No %s found in trash', 'baby_nf' ), $plural ),
					'parent' 				=> sprintf( __( 'Parent %s', 'baby_nf' ), $singular )
				),
				'description' => sprintf( __( 'This is where you can create and manage %s.', 'baby_nf' ), $plural ),
				'public' 				=> true,
				'show_ui' 				=> true,
				'capability_type' 		=> 'post',
				'map_meta_cap'          => true,
				'publicly_queryable' 	=> true,
				'exclude_from_search' 	=> false,
				'hierarchical' 			=> false,
				'rewrite' 				=> true,
				'query_var' 			=> true,
				'supports' 				=> array('title','thumbnail'),
				'show_in_nav_menus' 	=> false,
				'menu_icon' => 'dashicons-admin-users',
			) )
		); 
		}
	}
	
	new class_baby_nf_post_types();