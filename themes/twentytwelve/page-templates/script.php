<?php /*
Template Name: Script Update
*/
?>
<?php get_header(); ?>

<?php

print_r($_FILES);
if($_POST['csvfilesubmit']){
	//print_r($_FILES);die;
	$csvfiletype = $_FILES['csvfiletype'];
	$tmpName = $_FILES['csvfiletype']['tmp_name'];
	$csvAsArray = array_map('str_getcsv', file($tmpName));
	//echo '<pre>';print_r($csvAsArray);die;
	foreach ($csvAsArray as $_csvAsArray) {
		if(!empty($_csvAsArray[1])){
			if($_csvAsArray[3] == 'boy'){
				echo '<pre>';print_r($_csvAsArray);die;
				$new_post = array(
					'ID' => '',
					'post_author' =>1, 
					'post_category' => array($post_category),
					'post_content' => $post_content, 
					'post_type' => 'baby_name',
					'post_title' => $post_title,
					'post_status' => 'publish',
					'comment_status' => 'closed',
					'ping_status' => 'closed',
				);
				$post_id = wp_insert_post($new_post);
				if(!empty($post_id)){
					add_post_meta( $post_id, 'baby_nf_meta_origin', 'american' );
					add_post_meta( $post_id, 'baby_nf_meta_keyword', 'american' );				
				}
			}else if($_csvAsArray[3] == 'girl'){

			}
		}
		
		
	}









	//$file = fopen('myCSVFile.csv', 'r');
	// $tmpName = $_FILES['csvfiletype']['tmp_name'];
	// $csvAsArray = array_map('str_getcsv', file($tmpName));
	// while (($line = fgetcsv($file)) !== FALSE) {  
	// 	print_r($line);
	// }
	// fclose($file);	


}

?>
<form action="" method="POST" enctype="multipart/form-data">
	<input type="file" name="csvfiletype">	
	<input type="submit" name="csvfilesubmit">
</form>

<?php get_footer(); ?>