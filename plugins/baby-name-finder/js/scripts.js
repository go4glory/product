jQuery(document).ready(function($)
	{

        $('#baby_nf_expire_date').datepicker({
            dateFormat : 'yy-mm-dd'
        });


		$(document).on('submit', '#frontend-form-baby-submit', function(event)
			{
				
				
				
				var post_title = $('.post_title').val();
				var post_content = $('#post_content').val();
				var baby_nf_company_name = $('#baby_nf_company_name').val();			
				var baby_nf_location = $('#baby_nf_location').val();
				var baby_nf_address = $('#baby_nf_address').val();				
				var file_baby_nf_company_logo = $('#file_baby_nf_company_logo').val();
				var baby_nf_short_content = $('#baby_nf_short_content').val();				
				var baby_nf_how_to_apply = $('#baby_nf_how_to_apply').val();				
				var baby_nf_contact_email = $('#baby_nf_contact_email').val();
				var baby_nf_apply_method = $('.baby_nf_apply_method:checked').val();				
				var recaptcha = $('#recaptcha-anchor').attr('aria-checked');				

				
				error = '';
				
				cross_icon = '<i class="fa fa-close"></i>';
				
				if(post_title==''){
					
					error+= '<div class="message warring" >'+cross_icon+' baby Title is missing.</div>';
					}
				
				if(post_content==''){
					
					error+= '<div class="message warring" >'+cross_icon+' baby Content is missing.</div>';
					}	
					
				if(baby_nf_company_name==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Company Name is missing.</div>';
					}					
								
				if(baby_nf_location==''){
					
					error+= '<div class="message warring" >'+cross_icon+' baby Location is missing.</div>';
					}	
					
					
				if(baby_nf_address==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Address is missing.</div>';
					}	
										
				if(file_baby_nf_company_logo==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Company Logo is missing.</div>';
					}					
					
				if(baby_nf_short_content==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Short Content is missing.</div>';
					}
					
				if(baby_nf_how_to_apply==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Apply instruction is missing.</div>';
					}	
					
				if(baby_nf_contact_email==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Contact Email is missing.</div>';
					}					
														
				if(baby_nf_apply_method==''){
					
					error+= '<div class="message warring" >'+cross_icon+' Apply Method is missing.</div>';
					}	
					
														
				if(grecaptcha.getResponse() ==''){
					
					error+= '<div class="message warring" >'+cross_icon+' reCaptcha is missing.</div>';
					}					
																			
				
				
				$('.validations').html(error);
				
				if(error){
					
					event.preventDefault();
					$(window).scrollTop($('.validations').offset().top);
					}
				
				
				})











		$(document).on('change', '.baby-submit-form .baby_nf_salary_type', function()
			{
				var salary_type = $(this).val();
				//alert(salary_type);
				
				if(salary_type=='fixed'){
					
					$('.salary_fixed').fadeIn();
					$('.salary_min, .salary_max').fadeOut();
					
					}
				else if(salary_type=='min-max'){
					
					$('.salary_min, .salary_max').fadeIn();
					$('.salary_fixed').fadeOut();
					
					}
				else{
					$('.salary_fixed').fadeOut();
					$('.salary_min, .salary_max').fadeOut();
					}
				
			})	







	});	







