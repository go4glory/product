<?php
   /*
   Plugin Name: Bhavesh
   description: For the amazing website
   Version: 1.0
   Author: Mr.Bhavesh   
   */
   ?>
   <?php
   add_action('wp_enqueue_scripts', 'includeCSSAndJS');
   if(file_exists(plugin_dir_path( __FILE__ ).'simple_html_dom.php')){
     include_once(plugin_dir_path( __FILE__ ).'simple_html_dom.php');
   }
   function includeCSSAndJS() {
    wp_register_style('my_css', plugins_url('/css/style.css',__FILE__ ));
    wp_enqueue_style('my_css');    
     // wp_register_script( 'my_js', plugins_url('your_script.js',__FILE__ ));
     // wp_enqueue_script('my_js');
  }?>