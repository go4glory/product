<?php /*
  Template Name: Script Update
 */
  ?>
  <?php get_header(); ?>

  <?php

  // $query = 'SELECT post_title,meta_key,meta_value FROM wp_posts LEFT JOIN wp_postmeta on wp_postmeta.post_id = wp_posts.ID 
  // WHERE wp_posts.ID = 34085';

  $query = 'SELECT post_title,ID FROM wp_posts1 WHERE ID>32000 AND ID<34086'; 
  $postObj = $wpdb->get_results($query);
  foreach ($postObj as $value) {
    if(!empty($value->post_title)){
      $new_post = array(
        'ID' => '',
        'post_author' => 1,
        'post_content' => '',
        'post_type' => 'baby_name',
        'post_title' => $value->post_title,
        'post_status' => 'publish',
        'comment_status' => 'closed',
        'ping_status' => 'closed',
      );
      $post_id = wp_insert_post($new_post);
    //echo '<pre>';print_r($value->post_title);
      $query = 'SELECT meta_key,meta_value FROM wp_postmeta1 WHERE post_ID = '.$value->ID;
      $postmetaObj = $wpdb->get_results($query);
      foreach ($postmetaObj as $_postmetaObj) {
        //echo '<pre>';print_r($_postmetaObj->meta_key);
        //echo '<pre>';print_r($_postmetaObj->meta_value);
        add_post_meta($post_id, $_postmetaObj->meta_key, $_postmetaObj->meta_value);
      } 
    }
    
  }
  die;
//   foreach (range('a', 'z') as $char) {
//     for ($i = 1; $i <= 7; $i++){
//         if($i == 1){
//             $html = file_get_html('https://hindunames.net/browse/girl/names/letter/'.$char.'/');
//         }else{
//             $html = file_get_html('https://hindunames.net/browse/girl/names/letter/'.$char.'/'.$i);
//         }
//         if(!empty($html)){
//             $tr_array = $html->find(".container2 table tbody tr");
//             $temp = [];
//             $cnt = 0;
//             $flag = 1;
//             $final = [];

//             $notRequiredArr  = array('Names','Gender','Meaning','Favorites');
//             foreach ($tr_array as $tr1) {
//                 foreach ($tr1->children as $tr) {
//                     if (!in_array(trim($tr->plaintext), $notRequiredArr)) {
//                         //echo '<br/>'.$flag.'==>';print_r($tr->plaintext);
//                         if ($flag == 1) {
//                             $temp['name'] = $tr->plaintext;
//                         } else if ($flag == 3) {
//                             $temp['meaning'] = $tr->plaintext;
//                             $final[] = $temp;
//                         }                    
//                         if ($flag == 4) {
//                             $temp = [];
//                             $flag = 1;
//                         }else{
//                             $flag = $flag + 1;
//                         }    

//                     }
//                 }
//             }
//             //echo '<pre/>'; print_r($final); die("Killed");
//             foreach ($final as $value) {
//                 $new_post = array(
//                     'ID' => '',
//                     'post_author' => 1,
//                     'post_content' => '',
//                     'post_type' => 'baby_name',
//                     'post_title' => $value['name'],
//                     'post_status' => 'publish',
//                     'comment_status' => 'closed',
//                     'ping_status' => 'closed',
//                 );
//                 $post_id = wp_insert_post($new_post);
//                 if (!empty($post_id)) {
//                     add_post_meta($post_id, 'baby_nf_meta_keyword', 'indian');
//                     add_post_meta($post_id, 'baby_nf_meta_keyword', 'indian');
//                     add_post_meta($post_id, 'baby_nf_meta_gender', 'female');
//                     add_post_meta($post_id, 'baby_nf_meta_religion', 'Hinduism');
//                     add_post_meta($post_id, 'baby_nf_meta_origin', 'indian');
//                     add_post_meta($post_id, 'baby_nf_meta_meaning', $value['meaning']);
//                 }
//             } 
//         }

//     }
// }
  ?>
  <?php get_footer(); ?>