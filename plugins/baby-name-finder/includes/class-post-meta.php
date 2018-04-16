<?php

/*
* @Author 		ParaTheme
* @Folder	 	baby-name-finder/includes
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 

class class_baby_nf_post_meta{
	
	public function __construct(){

		//meta box action for "baby"
		add_action('add_meta_boxes', array($this, 'meta_boxes_baby'));
		add_action('save_post', array($this, 'meta_boxes_baby_save'));

		}
		
	
	public function baby_meta_options($options = array()){


		$options['Naming'] = array(
	
			'baby_nf_meta_meaning'=>array(
				'css_class'=>'baby_nf_meta_meaning',					
				'title'=>'Meaning',
				'option_details'=>'Write the meaning of the name',
				'input_type'=>'textarea',
			),	
			
			'baby_nf_meta_origin'=>array(
				'css_class'=>'baby_nf_meta_origin',					
				'title'=>'Origin',
				'input_type'=>'select',
				'input_args'=> apply_filters( 'baby_nf_filter_origin_list', '' ),
			),
			
			'baby_nf_meta_details'=>array(
				'css_class'=>'baby_nf_meta_details',					
				'title'=>'Details',
				'option_details'=>'Add some description of this name',
				'input_type'=>'textarea',
			),		
		
		);
		
		$options['Options'] = array(
		
			'baby_nf_meta_gender'=>array(
				'css_class'=>'baby_nf_meta_gender',
				'title'=>'Gender',
				'input_type'=>'select',
				'input_args'=> array(''=>'Select gender', 'male'=>'Male', 'female'=>'Female', 'other'=>'Other'),
			),
			
			'baby_nf_meta_nationality'=>array(
				'css_class'=>'baby_nf_meta_nationality',					
				'title'=>'Select Nationality',
				'input_type'=>'select',
				'input_args'=> apply_filters( 'baby_nf_filter_country_list', '' ),
			),
			
			'baby_nf_meta_religion'=>array(
				'css_class'=>'baby_nf_meta_religion',					
				'title'=>'Select Religion',
				'input_type'=>'select',
				'input_args'=> apply_filters( 'baby_nf_filter_religious_list', '' ),
			),

			'baby_nf_meta_keyword'=>array(
				'css_class'=>'baby_nf_meta_keyword',					
				'title'=>'Keyword',
				'option_details'=>'Give some Keyword to make this easier to find',
				'input_type'=>'textarea',
			),		
			
	
		);
		




			
			$options = apply_filters( 'baby_nf_filters_baby_meta_options', $options );

			return $options;
		
		}
	
	
	public function baby_meta_options_form(){
		global $post;
			
		$baby_meta_options = $this->baby_meta_options();
		$html = '';
			
		$html.= '<div class="para-settings wp-logo-slider-settings">';		
		
		$html_nav = '';
		$html_box = '';
				
		$i=1;
		foreach($baby_meta_options as $key=>$options)
		{
			if ( $i == 1 ):
				$html_nav.= '<li nav="'.$i.'" class="nav'.$i.' active">'.$key.'</li>';	
				$html_box.= '<li style="display: block;" class="box'.$i.' tab-box active">';
			else:
				$html_nav.= '<li nav="'.$i.'" class="nav'.$i.'">'.$key.'</li>';
				$html_box.= '<li style="display: none;" class="box'.$i.' tab-box">';
			endif;
		
			foreach($options as $option_key=>$option_info)
			{
				$option_value =  get_post_meta( $post->ID, $option_key, true );
				
				if(!empty($option_info['input_values']))
					if(empty($option_value)) $option_value = $option_info['input_values'];

				$option_details	= isset($option_info['option_details']) ? $option_info['option_details'] : '';
				$status 		= isset($option_info['status']) ? $option_info['status'] : '';
				$placeholder 	= isset($option_info['placeholder']) ? $option_info['placeholder'] : '';
				$rows 			= isset($option_info['rows']) ? $option_info['rows'] : '';
				
				//================================================//
				
				$html_box.= '<div class="option-box '.$option_info['css_class'].'">';
				$html_box.= '<p class="option-title">'.$option_info['title'].'</p>';
				$html_box.= '<p class="option-info">'.$option_details.'</p>';

				
				if($option_info['input_type'] == 'text')
					$html_box.= '<input id="'.$option_key.'" '.$status.' type="text" placeholder="'.$placeholder.'" name="'.$option_key.'" value="'.$option_value.'" /> ';					
				
				elseif($option_info['input_type'] == 'number')
					$html_box.= '<input id="'.$option_key.'" '.$status.' type="number" placeholder="'.$placeholder.'" name="'.$option_key.'" value="'.$option_value.'" /> ';					
				
				elseif($option_info['input_type'] == 'textarea')
					$html_box.= '<textarea rows="'.$rows.'" id="'.$option_key.'" placeholder="'.$placeholder.'" name="'.$option_key.'" >'.$option_value.'</textarea> ';

				elseif($option_info['input_type'] == 'radio')
				{
					$input_args = $option_info['input_args'];
					
					foreach($input_args as $input_args_key=>$input_args_values)
					{
						if($input_args_key == $option_value) $checked = 'checked';
						else $checked = '';
							
						$html_box.= '<label class="radio_input"><input class="'.$option_key.'" type="radio" '.$checked.' value="'.$input_args_key.'" name="'.$option_key.'"   >'.$input_args_values.'</label>';
					}
				}
				elseif($option_info['input_type'] == 'select')
				{
					$input_args = $option_info['input_args'];
					$html_box.= '<select name="'.$option_key.'" >';
					foreach($input_args as $input_args_key=>$input_args_values)
					{
						if($input_args_key == $option_value) $selected = 'selected';
						else $selected = '';

						$html_box.= '<option '.$selected.' value="'.$input_args_key.'">'.$input_args_values.'</option>';
					}
					$html_box.= '</select>';
				}	
				
				elseif($option_info['input_type'] == 'checkbox')
				{
					$input_args = $option_info['input_args'];
					$html_box.= '<div id="'.$option_key.'">';
					
					foreach($input_args as $input_args_key=>$input_args_values)
					{
						if ( empty($input_args_key) ){
							$html_box.= '<label class="checkbox_input"> '.__('No '.$option_info['title'].' Found. Add items in Settings.','wp_re').'</label>';
							continue;
						}
							
						if ( is_array($option_value) && in_array( $input_args_key, $option_value) )	$checked = 'checked';
						else $checked = '';

						$html_box.= '<label class="checkbox_input"> <input '.$checked.' value="'.$input_args_key.'" name="'.$option_key.'[]"  type="checkbox" > '.$input_args_values.'</label>';
					}
					$html_box.= '</div>';
				}	
				
				elseif($option_info['input_type'] == 'file')
				{
					$html_box.= '<input type="text" id="file_'.$option_key.'" name="'.$option_key.'" value="'.$option_value.'" />';
					$html_box.= '<input id="upload_button_'.$option_key.'" class="upload_button_'.$option_key.' button" type="button" value="Upload File" />';					
					$html_box.= '<div style="" class="logo-preview"><img width="100%" src="'.$option_value.'" /></div>';
					$html_box.= '
					<script>
						jQuery(document).ready(function($){
							var custom_uploader; 
							jQuery("#upload_button_'.$option_key.'").click(function(e) {
								e.preventDefault();
							 	if (custom_uploader) {
									custom_uploader.open();
									return;
								}
								custom_uploader = wp.media.frames.file_frame = wp.media({
									title: "Choose File",
									button: {
										text: "Choose File"
									},
									multiple: false
								});
								custom_uploader.on("select", function() {
									attachment = custom_uploader.state().get("selection").first().toJSON();
									jQuery("#file_'.$option_key.'").val(attachment.url);
									jQuery(".logo-preview img").attr("src",attachment.url);											
								});
								custom_uploader.open();
							});
						})
					</script>';					
				}
				
				$html_box.= '</div>';
			}
			$html_box.= '</li>';
			$i++;
		}
		$html.= '<ul class="tab-nav">';
		$html.= $html_nav;			
		$html.= '</ul>';
		$html.= '<ul class="box">';
		$html.= $html_box;
		$html.= '</ul>';		
		$html.= '</div>';			
		return $html;
		}
	
	
	
	
	public function meta_boxes_baby($post_type) {
			$post_types = array('baby_name');
	 
			//limit meta box to certain post types
			if (in_array($post_type, $post_types)) {
				add_meta_box('baby_metabox',
				__('baby Data','baby_nf'),
				array($this, 'baby_meta_box_function'),
				$post_type,
				'normal',
				'high');
			}
		}
	public function baby_meta_box_function($post) {
 
        // Add an nonce field so we can check for it later.
        wp_nonce_field('baby_nonce_check', 'baby_nonce_check_value');
 
        // Use get_post_meta to retrieve an existing value from the database.
       // $baby_nf_data = get_post_meta($post -> ID, 'baby_nf_data', true);

		$baby_meta_options = $this->baby_meta_options();
		
		//var_dump($baby_meta_options);
		foreach($baby_meta_options as $options_tab=>$options){
			
			foreach($options as $option_key=>$option_data){
				
				${$option_key} = get_post_meta($post -> ID, $option_key, true);

				}
			}
			
		//var_dump($baby_nf_salary_currency);
        // Display the form, using the current value.
		
		?>
        <div class="baby-bm-meta">
        
        <?php
		
		
        echo $this->baby_meta_options_form(); 
		?>
        </div>
        
        
        <script>
		jQuery(document).ready(function($)
			{
				var baby_nf_salary_type = $('.baby_nf_salary_type:checked').val();
				
				if(baby_nf_salary_type =='fixed'){
					
					$('.option-box.salary_fixed').fadeIn();
					}
				else if(baby_nf_salary_type =='min-max'){
					
					
					$('.option-box.salary_min').fadeIn();
					$('.option-box.salary_max').fadeIn();					
					
					}
				
			})
		</script>
        
        
        
        
        
        <?php
		

		
		




   		}
	
	
	public function meta_boxes_baby_save($post_id){
	 
			/*
			 * We need to verify this came from the our screen and with 
			 * proper authorization,
			 * because save_post can be triggered at other times.
			 */
	 
			// Check if our nonce is set.
			if (!isset($_POST['baby_nonce_check_value']))
				return $post_id;
	 
			$nonce = $_POST['baby_nonce_check_value'];
	 
			// Verify that the nonce is valid.
			if (!wp_verify_nonce($nonce, 'baby_nonce_check'))
				return $post_id;
	 
			// If this is an autosave, our form has not been submitted,
			//     so we don't want to do anything.
			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
				return $post_id;
	 
			// Check the user's permissions.
			if ('page' == $_POST['post_type']) {
	 
				if (!current_user_can('edit_page', $post_id))
					return $post_id;
	 
			} else {
	 
				if (!current_user_can('edit_post', $post_id))
					return $post_id;
			}
	 
			/* OK, its safe for us to save the data now. */
	 
			// Sanitize the user input.
			//$baby_nf_data = stripslashes_deep($_POST['baby_nf_data']);
	
			
			// Update the meta field.
			//update_post_meta($post_id, 'baby_nf_data', $baby_nf_data);
			
			$baby_meta_options = $this->baby_meta_options();
			
			foreach($baby_meta_options as $options_tab=>$options){
				
				foreach($options as $option_key=>$option_data){
					
					${$option_key} = stripslashes_deep($_POST[$option_key]);
					
					update_post_meta($post_id, $option_key, ${$option_key});			
					
					}
				}
			
			
			
			
			
					
		}
	
	}


new class_baby_nf_post_meta();