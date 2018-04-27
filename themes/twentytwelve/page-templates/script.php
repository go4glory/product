<?php /*
  Template Name: Script Update
 */
?>
<?php get_header(); ?>

<?php
//print_r($_FILES);
if ($_POST['csvfilesubmit']) {
    //print_r($_FILES);die;
    $csvfiletype = $_FILES['csvfiletype'];
    $tmpName = $_FILES['csvfiletype']['tmp_name'];
    $csvAsArray = array_map('str_getcsv', file($tmpName));
    //echo '<pre>';print_r($csvAsArray);die;
    foreach ($csvAsArray as $_csvAsArray) {
        if (!empty($_csvAsArray[1])) {
            $new_post = array(
                'ID' => '',
                'post_author' => 1,
                'post_content' => $_csvAsArray[1],
                'post_type' => 'baby_name',
                'post_title' => $_csvAsArray[1],
                'post_status' => 'publish',
                'comment_status' => 'closed',
                'ping_status' => 'closed',
            );
            $post_id = wp_insert_post($new_post);
            if (!empty($post_id)) {
                add_post_meta($post_id, 'baby_nf_meta_origin', 'american');
                add_post_meta($post_id, 'baby_nf_meta_keyword', 'american');
                $gender = 'girl';
                if ($_csvAsArray[3] == 'boy') {
                    $gender = 'boy';
                }
                add_post_meta($post_id, 'baby_nf_gender', $gender);
            }
            //die("Inserted");			
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
//foreach (range('b', 'd') as $char) {
//    echo 'http://tadeebulquran.com/muslim-boys-names-' . $char . '/';
//    echo '<br/>';
//}die;
foreach (range('t', 'z') as $char) {
    $html = file_get_html('http://tadeebulquran.com/muslim-girls-names-' . $char . '/');
    //$tr_array = $html->find(".right_box table tbody tr td table tbody tr td table tbody tr");
    $tr_array = $html->find(".right_box table tbody tr");
    $temp = [];
    $cnt = 0;
    $flag = 1;
    $final = [];
    foreach ($tr_array as $tr1) {
        foreach ($tr1->children as $tr) {
            if ($tr->attr['colspan'] != 3 && !empty($tr->plaintext) && !in_array($tr->plaintext, ['Name', 'Meaning'])) {
                if ($flag == 1) {
                    $temp['name'] = $tr->plaintext;
                } else if ($flag == 2) {
                    $temp['meaning'] = $tr->plaintext;
                    $final[] = $temp;
                }
                $flag = $flag + 1;

                if ($flag % 3 == 0) {
                    $temp = [];
                    $flag = 1;
                }
            }
        }
    }
//echo '<pre/>'; print_r($final); die("Killed");

    foreach ($final as $value) {
        $new_post = array(
            'ID' => '',
            'post_author' => 1,
            'post_content' => '',
            'post_type' => 'baby_name',
            'post_title' => $value['name'],
            'post_status' => 'publish',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
        );
        $post_id = wp_insert_post($new_post);
        if (!empty($post_id)) {
            add_post_meta($post_id, 'baby_nf_meta_keyword', 'indian');
            add_post_meta($post_id, 'baby_nf_gender', 'boy');
            add_post_meta($post_id, 'baby_nf_religion', 'Muslim');
            add_post_meta($post_id, 'baby_nf_meta_origin', 'indian');
            add_post_meta($post_id, 'baby_nf_meta_meaning', $value['meaning']);
        }
    }
}
/*
  [0] => Array ([name] => Aaban[meaning] => Name of the Angel)
  [1] => Array ([name] => Aabid [meaning] => Worshiper )
 */
?>
<!-- <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="csvfiletype">	
        <input type="submit" name="csvfilesubmit">
</form> -->

<?php get_footer(); ?>