<?php	


/*
* @Author 		ParaTheme
* Copyright: 	2015 ParaTheme
*/

if ( ! defined('ABSPATH')) exit;  // if direct access 



class class_baby_nf_addons_page  {
	
	
    public function __construct(){


    }
	
	
	public function baby_nf_addons_data($addons_data = array()){
		
		$addons_data_new = array(
							
			'company-profile'=>array(	'title'=>'Company Profile',
										'version'=>'1.0.0',
										'price'=>'free',
										'content'=>'Addon for creating company profile.',										
										'item_link'=>'https://wordpress.org/plugins/baby-name-finder-company-profile/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/company-profile.png',							
			),
			
			'locations'=>array(	'title'=>'Locations',
										'version'=>'1.0.0',
										'price'=>'free',
										'content'=>'Awesome location single page and display baby list under any location via single page.',										
										'item_link'=>'https://wordpress.org/plugins/baby-name-finder-locations/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/locations.png',							
			),			

						
			'saved-babys'=>array(	'title'=>'Saved babys',
										'version'=>'1.0.0',
										'price'=>'$15',
										'content'=>'Allow visitors to save baby link as bookmarks to thier account.',										
										'item_link'=>'http://www.pickplugins.com/item/baby-name-finder-saved-babys/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/saved-babys.png',							
			),	
			
			'social-share'=>array(	'title'=>'Social Share',
										'version'=>'1.0.0',
										'price'=>'$15',
										'content'=>'Social Share allow visitors to share baby link to thier social network site.',										
										'item_link'=>'http://www.pickplugins.com/item/baby-name-finder-social-share/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/social-share.png',							
			),			
			
			'application-manager'=>array('title'=>'Application Manager',
										'version'=>'1.0.0',
										'price'=>'$19',
										'content'=>'Manage application for every baby.',										
										'item_link'=>'http://www.pickplugins.com/item/baby-name-finder-application-manager/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/application-manager.png',							
			),				
			
			'stats'=>array(	'title'=>'Stats',
										'version'=>'1.0.0',
										'price'=>'$10',
										'content'=>'Display baby stats.',										
										'item_link'=>'http://www.pickplugins.com/item/baby-name-finder-stats/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/stats.png',							
			),
			
			'categories'=>array(	'title'=>'Categories',
										'version'=>'1.0.0',
										'price'=>'free',
										'content'=>'Display baby Categories.',										
										'item_link'=>'http://www.pickplugins.com/item/baby-name-finder-categories/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/categories.png',							
			),			
			
			'paid-listing'=>array(	'title'=>'Paid Listing',
										'version'=>'1.0.0',
										'price'=>'$19',
										'content'=>'Get paid by listing babys via WooCommerce.',										
										'item_link'=>'http://www.pickplugins.com/item/baby-name-finder-woocommerce-paid-listing/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/paid-listing.png',							
			),				
			
			
			'baby-list-ads'=>array(	'title'=>'baby List Ads',
										'version'=>'1.0.0',
										'price'=>'$10',
										'content'=>'Display ads/custom html content inside baby list.',										
										'item_link'=>'http://www.pickplugins.com/item/baby-name-finder-baby-list-ads/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/baby-list-ads.png',							
			),				
						
			
			'search'=>array(	'title'=>'Search & Filter',
										'version'=>'1.0.0',
										'price'=>'$19',
										'content'=>'Search & filter baby by different input.',										
										'item_link'=>'http://www.pickplugins.com/item/baby-name-finder-search/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/search.png',							
			),
			
			'baby-feed'=>array(	'title'=>'baby Feed',
										'version'=>'1.0.0',
										'price'=>'$25',
										'content'=>'Display babys by followed companies, like social feed, once you follow any company baby published from these company will display as like social feed.',										
										'item_link'=>'http://www.pickplugins.com/item/baby-name-finder-baby-feed/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/baby-feed.png',							
			),			
						
			'report-baby'=>array(	'title'=>'Report baby',
										'version'=>'1.0.1',
										'price'=>'$12',
										'content'=>'add functionality to report/flag/moderate  a baby.',										
										'item_link'=>'http://www.pickplugins.com/item/baby-name-finder-report-baby/',
										'thumb'=>baby_nf_plugin_url.'includes/menu/images/report-baby.png',							
			),							
						
							
			
						

		);
		
		$addons_data = array_merge($addons_data_new,$addons_data);
		
		$addons_data = apply_filters('baby_nf_filters_addons_data', $addons_data);
		
		return $addons_data;
		
		
		}
	
	public function baby_nf_addons_list_html(){
		
		$html = '';
		
		$addons_data = $this->baby_nf_addons_data();
		
		foreach($addons_data as $key=>$values){
			
			$html.= '<div class="single '.$key.'">';
			$html.= '<div class="thumb"><a href="'.$values['item_link'].'"><img src="'.$values['thumb'].'" /></a></div>';			
			$html.= '<div class="title"><a href="'.$values['item_link'].'">'.$values['title'].'</a></div>';
			$html.= '<div class="content">'.$values['content'].'</div>';						
			$html.= '<div class="meta version"><b>Version:</b> '.$values['version'].'</div>';			
			$html.= '<div class="meta price"><b>Price:</b> '.$values['price'].'</div>';							
			
			$html.= '</div>';
			
		
			
			}
		
		$html.= '';		
		
		return $html;
		}

	
	
	
}

new class_baby_nf_addons_page();


	
?>





<div class="wrap">

	<div id="icon-tools" class="icon32"><br></div><?php echo "<h2>".__(baby_nf_plugin_name.' - Addons', 'baby_nf')."</h2>";?>
	<div class="baby-bm-addons">
    
    <?php
    
	$class_baby_nf_addons_page = new class_baby_nf_addons_page();
	
	echo $class_baby_nf_addons_page->baby_nf_addons_list_html();
	
	
	?>
    </div>


</div>
