<?php

/*
* @Author 		ParaTheme
* @Folder	 	baby-name-finder\themes\babylist

* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access
	
	
	$baby_nf_archive_page_id = get_option('baby_nf_archive_page_id');
	$baby_nf_list_per_page = get_option('baby_nf_list_per_page');	
	$baby_nf_archive_page_link = get_permalink($baby_nf_archive_page_id);
	
	
	$permalink_structure = get_option('permalink_structure');
	if( empty($permalink_structure) ) $permalink_joint = '&';
	else $permalink_joint = '?';

	$baby_nf_filter_origin_list = apply_filters( 'baby_nf_filter_origin_list', '');	
	$baby_nf_gender_list 		= array(''=>'Select gender', 'male'=>'Male', 'female'=>'Female', 'other'=>'Other');
	$baby_nf_nationality_list 	= apply_filters( 'baby_nf_filter_country_list', '');	
	$baby_nf_religious_list		= apply_filters( 'baby_nf_filter_religious_list', '');	
	

	if( empty($max_item) ) $baby_nf_list_per_page = $baby_nf_list_per_page;
	else $baby_nf_list_per_page = $max_item;
	
	if ( get_query_var('paged') )  $paged = get_query_var('paged');
	elseif ( get_query_var('page') ) $paged = get_query_var('page');
	else $paged = 1;

	$meta_query = array( 'relation' => 'AND' );	
	
	if( empty($_GET['keywords'])) $keywords = '';
	else
	{
		$keywords = sanitize_text_field($_GET['keywords']);
		$meta_query[] = array(
			'key' => 'baby_nf_meta_keyword',
			'value' => $keywords,
			'compare' => 'LIKE',
		);
	}
		
		
	if(empty($_GET['baby_nf_origin'])) $baby_nf_origin = '';
	else 
	{
		$baby_nf_origin = sanitize_text_field($_GET['baby_nf_origin']);
		$meta_query[] = array(
			'key' => 'baby_nf_meta_origin',
			'value' => $baby_nf_origin ,
			'compare' => '=',
		);
	}	
	
	if(empty($_GET['baby_nf_gender'])) $baby_nf_gender = '';
	else 
	{
		$baby_nf_gender = sanitize_text_field($_GET['baby_nf_gender']);
		$meta_query[] = array(
			'key' => 'baby_nf_meta_gender',
			'value' => $baby_nf_gender ,
			'compare' => '=',
		);
	}	
	
	
	if(empty($_GET['baby_nf_nationality'])) $baby_nf_nationality = '';
	else
	{
		$baby_nf_nationality = sanitize_text_field($_GET['baby_nf_nationality']);
		$meta_query[] = array(
			'key' => 'baby_nf_meta_nationality',
			'value' => $baby_nf_nationality ,
			'compare' => '=',
		);
	}				
	
	if(empty($_GET['baby_nf_religion'])) $baby_nf_religion = '';
	else
	{
		$baby_nf_religion = sanitize_text_field($_GET['baby_nf_religion']);
		$meta_query[] = array(
			'key' => 'baby_nf_meta_religion',
			'value' => $baby_nf_religion ,
			'compare' => '=',
		);
	}
	
	$html .= '
	<div class="baby-nf-search">
		<div class="baby_nf_indexing" align="center">';
		
		$html.='<span class="baby_nf_each"> 
					<a class="baby_nf_each_a" href="'.$baby_nf_archive_page_link.$permalink_joint.'"><i class="fa fa-bars"></i></a></span>';
		
		foreach (range('A', 'Z') as $char)
			$html.='<span class="baby_nf_each"> 
					<a class="baby_nf_each_a" href="'.$baby_nf_archive_page_link.$permalink_joint.'satrts_with='.$char.'">'.strtoupper($char).'</a></span>';
		
	$html .= '</div>';
	
	if(empty($_GET['satrts_with'])) $satrts_with = '';
	else $satrts_with = sanitize_text_field($_GET['satrts_with']);
	
	$html .= '<div class="search-result job-list">';	
		
		$wp_query = new WP_Query(
			array (
				'post_type' => 'baby_name',
				'post_status' => 'publish',
				'meta_query' => $meta_query,
				'posts_per_page' => $baby_nf_list_per_page,
				'paged' => $paged,
				'startswith' => $satrts_with,
			) 
		);
		

		$html .= '<div class="baby_nf-list">';		
				
		if ( $wp_query->have_posts() ) :
		while ( $wp_query->have_posts() ) : $wp_query->the_post();	
		
			$class_baby_nf_post_meta = new class_baby_nf_post_meta();
			$baby_meta_options = $class_baby_nf_post_meta->baby_meta_options();
			
			foreach($baby_meta_options as $options_tab=>$options)
			{
				foreach($options as $option_key=>$option_data)
				{
					${$option_key} = get_post_meta(get_the_ID(), $option_key, true);			
					${'meta_'.$option_key} = $option_key;			
				}
			}
			
			//$html .= strtoupper(substr(apply_filters('the_title',get_the_title()),0,1));
			
			//$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()),'full' );
			//$thumb_url = $thumb['0'];
			
			$html .= '<div class="single">';
			
			//$html .= '<div class="logo"><img src="'.$thumb_url.'" /></div>';
			$html .= '
					<div class="rb_introduce">
						<a href="'.get_permalink().'">Name: '.get_the_title().'</a> 
						</br> <span class="baby_nf_meta_meaning">Meaning: '.$baby_nf_meta_meaning.'</span>
						</br> <span class="baby_nf_meta_details">Details: '.$baby_nf_meta_details.' </span>
					</div>';
			
			$html .= '<div class="clear"></div>';	
			$html .= '<div class="baby_nf-meta-box" align="center">';	
			
			if ( !empty ( $baby_nf_meta_origin ) ) {
				$html .= '
				<div class="baby_nf-meta '.$meta_baby_nf_meta_origin.'">
				<i class="fa fa-map-marker"></i>
				<a href="'.$baby_nf_archive_page_link.$permalink_joint.'baby_nf_origin='.$baby_nf_meta_origin.'">'.$baby_nf_filter_origin_list[$baby_nf_meta_origin].'</a></div>';
			}
			
			if ( $baby_nf_meta_gender == 'male' ) $icon_gender = '<i class="fa fa-male"></i>';
			else if ( $baby_nf_meta_gender == 'female' ) $icon_gender = '<i class="fa fa-female"></i>';
			else $icon_gender = '<i class="fa fa-transgender"></i>';
			
			if ( !empty( $baby_nf_meta_gender ) ) {
				$html .= '
				<div class="baby_nf-meta '.$meta_baby_nf_meta_gender.'">
					'.$icon_gender.'
					<a href="'.$baby_nf_archive_page_link.$permalink_joint.'baby_nf_gender='.$baby_nf_meta_gender.'">'.$baby_nf_gender_list[$baby_nf_meta_gender].'</a></div>';
			}
			
			if ( !empty( $baby_nf_meta_nationality ) ) {
				$html .= '
				<div class="baby_nf-meta '.$meta_baby_nf_meta_nationality.'">
				<i class="fa fa-location-arrow"></i>
				<a href="'.$baby_nf_archive_page_link.$permalink_joint.'baby_nf_nationality='.$baby_nf_meta_nationality.'">'.$baby_nf_nationality_list[$baby_nf_meta_nationality].'</a></div>';
			}
			
			if ( !empty( $baby_nf_meta_religion ) ) {
				$html .= '
				<div class="baby_nf-meta '.$meta_baby_nf_meta_religion.'">
				<i class="fa fa-bars"></i>
				<a href="'.$baby_nf_archive_page_link.$permalink_joint.'baby_nf_religion='.$baby_nf_meta_religion.'">'.$baby_nf_religious_list[$baby_nf_meta_religion].'</a></div>';
			}
			
			if ( !empty ( $baby_nf_meta_keyword ) ) {
				$html .= '
				<div class="baby_nf-meta '.$meta_baby_nf_meta_keyword.'">
				<i class="fa fa-key"></i>
				<a href="'.$baby_nf_archive_page_link.$permalink_joint.'keywords='.$baby_nf_meta_keyword.'">'.ucwords($baby_nf_meta_keyword).'</a></div>';
			}
			
			$html .= '</div>';
			
			$html .= '</div>';


		endwhile;
		
		$html .= '<div class="paginate">';
		$big = 999999999; // need an unlikely integer
		$html .= paginate_links( array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, $paged ),
			'total' => $wp_query->max_num_pages
			) );

		$html .= '</div >';	
		
		wp_reset_query();
		else:
		$html .= __('No baby found','baby_nf');	
		endif;				
		$html .= '</div>';
	
	$html .= '</div>';
	
	$html .= '</div>'; 	