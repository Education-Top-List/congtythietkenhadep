<?php 
function tg_metabox()
{
 add_meta_box( 'thong-tin-can-ho', 'Thông tin căn hộ', 'tg_inputs_info', 'post' );
}
add_action( 'add_meta_boxes', 'tg_metabox' );
 
/**
 Khai báo callback
 @param $post là đối tượng WP_Post để nhận thông tin của post
**/
function tg_inputs_info( $post )
{
 $host_building = get_post_meta( $post->ID, '_host_building', true );
 $mat_tien = get_post_meta( $post->ID, '_mat_tien', true );
 $the_loai = get_post_meta( $post->ID, '_the_loai', true );
 ?>
 <div class="list_info_building_adm">
   <div class="list_group">
     <label for="host_building">Chủ đầu tư: </label>
    <input type="text" id="host_building" name="host_building" value="<?php echo esc_attr( $host_building ); ?>" />
   </div>
   <div class="list_group">
     <label for="mat_tien">Mặt tiền: </label>
    <input type="text" id="mat_tien" name="mat_tien" value="<?php echo esc_attr( $mat_tien ); ?>" />
   </div>
   <div class="list_group">
     <label for="the_loai">Thể loại: </label>
    <input type="text" id="the_loai" name="the_loai" value="<?php echo esc_attr( $the_loai ); ?>" />
   </div>
 </div>
 <?php
}
 
/**
 Lưu dữ liệu meta box khi nhập vào
 @param post_id là ID của post hiện tại
**/
function tg_save( $post_id )
{
 $host_building = sanitize_text_field( $_POST['host_building'] );
 $mat_tien = sanitize_text_field( $_POST['mat_tien'] );
 $the_loai = sanitize_text_field( $_POST['the_loai'] );
 update_post_meta( $post_id, '_host_building', $host_building );
 update_post_meta( $post_id, '_mat_tien', $host_building );
 update_post_meta( $post_id, '_the_loai', $host_building );
}
add_action( 'save_post', 'tg_save' );

?>