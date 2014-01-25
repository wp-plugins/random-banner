<?php
/*
Plugin Name: Random Banner
Plugin URI: http://buffercode.com/random-banner-wordpress-plugin/
Description: Easy way to display the different size of banner advertisements in WordPress using widgets
Version: 1.0
Author: vinoth06
Author URI: http://buffercode.com/
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
// Additing Action hook widgets_init
add_action( 'widgets_init', 'buffercode_random_banner'); 

function buffercode_random_banner() {
register_widget( 'buffercode_random_banner_info' );
}

class buffercode_random_banner_info extends WP_Widget {
function buffercode_random_banner_info () {
		$this->WP_Widget('buffercode_random_banner_info', 'Random Banner','Select the category to display');	}

public function form( $instance ) { 
if ( isset( $instance[ 'buffercode_RBanner_title' ]) ) {
			$buffercode_RBanner_title = $instance[ 'buffercode_RBanner_title' ];
		}
else {
	$buffercode_RBanner_title = 'Advertisement';
	} 
?>
<p>Custom Title <input maxlength="50" class="widefat" name="<?php echo $this->get_field_name('buffercode_RBanner_title') ?>" type="text" value="<?php echo esc_attr( $buffercode_RBanner_title ); ?>" /></p>
<?php
}

function update($new_instance, $old_instance) {
$instance = $old_instance;
$instance['buffercode_RBanner_title'] = ( ! empty( $new_instance['buffercode_RBanner_title'] ) ) ? strip_tags( $new_instance['buffercode_RBanner_title'] ) : '';
return $instance;
}

function widget($args, $instance) {
extract($args);
echo $before_widget;
$buffercode_RBanner_title = apply_filters( 'widget_title', $instance['buffercode_RBanner_title'] );

/* Buffercode.com wordpress Banner upload plugin */

if ( !empty( $name ) ) { echo $before_title . $buffercode_RBanner_title .
$after_title; }
$count=-1; //buffercode.com random banner - array count
for($var1=1;$var1<=10;$var1++)
{
	$buffercode_RBanner_img_var=get_option('buffercode_RBanner_text_banner'.$var1.'');
	$buffercode_RBanner_url_var=get_option('buffercode_RBanner_url_banner'.$var1.'');
	if($buffercode_RBanner_img_var!='') {
		$buffercode_RBanner_img_var_WO_empty[]=$buffercode_RBanner_img_var;
		$buffercode_RBanner_img_url_WO_empty[]=$buffercode_RBanner_url_var;
		$count++;
	}
}

$buffercode_RBanner_rand_numb=rand(0,$count);
if(!empty($buffercode_RBanner_img_var_WO_empty[$buffercode_RBanner_rand_numb])){
echo '<!-- Buffercode.com Random Banner Plugin --> <a href="'.$buffercode_RBanner_img_url_WO_empty[$buffercode_RBanner_rand_numb].'" alt="'.$buffercode_RBanner_img_url_WO_empty[$buffercode_RBanner_rand_numb].'" target="_blank">';
echo '<img src="'.$buffercode_RBanner_img_var_WO_empty[$buffercode_RBanner_rand_numb].'" />';
echo '</a> <!-- Buffercode.com Random Banner Plugin -->'; 
/* Buffercode.com wordpress Banner upload plugin */
}
echo $after_widget;
}
}
// Adding Menu
add_action('admin_menu', 'buffercode_RBanner_menu');

function buffercode_RBanner_menu() {

	add_options_page( 'Random Banner', 'Random Banner', 'manage_options', __FILE__, 'buffercode_RBanner_menu_setting' );
	//call register settings function
	add_action( 'admin_init', 'buffercode_RBanner_settings' );
}


function buffercode_RBanner_settings() {
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_text_banner1' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_text_banner2' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_text_banner3' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_text_banner4' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_text_banner5' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_text_banner6' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_text_banner7' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_text_banner8' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_text_banner9' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_text_banner10' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_url_banner1' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_url_banner2' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_url_banner3' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_url_banner4' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_url_banner5' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_url_banner6' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_url_banner7' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_url_banner8' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_url_banner9' );
	register_setting( 'buffercode_RBanner_settings_group', 'buffercode_RBanner_url_banner10' );
}

function buffercode_RBanner_menu_setting() {
?>
<div class="wrap">
<h2>Random Banner Setting Page</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'buffercode_RBanner_settings_group' ); ?>
    <?php do_settings_sections( 'buffercode_RBanner_settings_group' );?>
	 
    <table class="form-table">
        <tr valign="top">
			<td></td>
        <td>
		<label for="upload_image">
		<input placeholder="banner1"  id="upload_image1" type="text" size="25" name="buffercode_RBanner_text_banner1" value="<?php echo get_option('buffercode_RBanner_text_banner1') ?>" />
		<input class="upload_image_button" class="button" type="button" value="Upload Image" />
		<br />Enter a URL (with http://) or upload an image<br />
		<input placeholder="Link for that image"  type="text" size="25" name="buffercode_RBanner_url_banner1" value="<?php echo get_option('buffercode_RBanner_url_banner1') ?>" />
		</label>
	</td>
	<td>
		<label for="upload_image">
		<input placeholder="banner2" id="upload_image2" type="text" size="25" name="buffercode_RBanner_text_banner2" value="<?php echo get_option('buffercode_RBanner_text_banner2') ?>" />
		<input class="upload_image_button" class="button" type="button" value="Upload Image" />
		<br />Enter a URL (with http://) or upload an image<br />
		<input placeholder="Link for that image"  type="text" size="25" name="buffercode_RBanner_url_banner2" value="<?php echo get_option('buffercode_RBanner_url_banner2') ?>" />
		</label>
	</td>
        </tr>
		
	<tr valign="top"><td></td>
        <td>
		<label for="upload_image">
		<input placeholder="banner3" id="upload_image3" type="text" size="25" name="buffercode_RBanner_text_banner3" value="<?php echo get_option('buffercode_RBanner_text_banner3') ?>" />
		<input class="upload_image_button" class="button" type="button" value="Upload Image" />
		<br />Enter a URL (with http://) or upload an image<br />
		<input placeholder="Link for that image"  type="text" size="25" name="buffercode_RBanner_url_banner3" value="<?php echo get_option('buffercode_RBanner_url_banner3') ?>" />
		</label>
	</td>
	<td>
		<label for="upload_image">
		<input placeholder="banner4" id="upload_image4" type="text" size="25" name="buffercode_RBanner_text_banner4" value="<?php echo get_option('buffercode_RBanner_text_banner4') ?>" />
		<input class="upload_image_button" class="button" type="button" value="Upload Image" />
		<br />Enter a URL (with http://) or upload an image<br />
		<input placeholder="Link for that image"  type="text" size="25" name="buffercode_RBanner_url_banner4" value="<?php echo get_option('buffercode_RBanner_url_banner4') ?>" />
		</label>
	</td>
        </tr>
		
	<tr valign="top"><td></td>
        <td>
		<label for="upload_image">
		<input placeholder="banner5" id="upload_image5" type="text" size="25" name="buffercode_RBanner_text_banner5" value="<?php echo get_option('buffercode_RBanner_text_banner5') ?>" />
		<input class="upload_image_button" class="button" type="button" value="Upload Image" />
		<br />Enter a URL (with http://) or upload an image<br />
		<input placeholder="Link for that image"  type="text" size="25" name="buffercode_RBanner_url_banner5" value="<?php echo get_option('buffercode_RBanner_url_banner5') ?>" />
		</label>
	</td>
	<td>
		<label for="upload_image">
		<input placeholder="banner6" id="upload_image6" type="text" size="25" name="buffercode_RBanner_text_banner6" value="<?php echo get_option('buffercode_RBanner_text_banner6') ?>" />
		<input class="upload_image_button" class="button" type="button" value="Upload Image" />
		<br />Enter a URL (with http://) or upload an image<br />
		<input placeholder="Link for that image"  type="text" size="25" name="buffercode_RBanner_url_banner6" value="<?php echo get_option('buffercode_RBanner_url_banner6') ?>" />
		</label>
	</td>
        </tr>
		
	<tr valign="top"><td></td>
        <td>
		<label for="upload_image">
		<input placeholder="banner7" id="upload_image7" type="text" size="25" name="buffercode_RBanner_text_banner7" value="<?php echo get_option('buffercode_RBanner_text_banner7') ?>" />
		<input class="upload_image_button" class="button" type="button" value="Upload Image" />
		<br />Enter a URL (with http://) or upload an image<br />
		<input placeholder="Link for that image"  type="text" size="25" name="buffercode_RBanner_url_banner7" value="<?php echo get_option('buffercode_RBanner_url_banner7') ?>" />
		</label>
	</td>
       
        <td>
		<label for="upload_image">
		<input placeholder="banner8" id="upload_image8" type="text" size="25" name="buffercode_RBanner_text_banner8" value="<?php echo get_option('buffercode_RBanner_text_banner8') ?>" />
		<input class="upload_image_button" class="button" type="button" value="Upload Image" />
		<br />Enter a URL (with http://) or upload an image<br />
		<input placeholder="Link for that image"  type="text" size="25" name="buffercode_RBanner_url_banner8" value="<?php echo get_option('buffercode_RBanner_url_banner8') ?>" />
		</label>
	</td>
        </tr>
		
	<tr valign="top"><td></td>
        <td>
		<label for="upload_image">
		<input placeholder="banner9" id="upload_image9" type="text" size="25" name="buffercode_RBanner_text_banner9" value="<?php echo get_option('buffercode_RBanner_text_banner9') ?>" />
		<input class="upload_image_button" class="button" type="button" value="Upload Image" />
		<br />Enter a URL (with http://) or upload an image<br />
		<input placeholder="Link for that image"  type="text" size="25" name="buffercode_RBanner_url_banner9" value="<?php echo get_option('buffercode_RBanner_url_banner9') ?>" />
		</label>
	</td>
        
        <td>
		<label for="upload_image">
		<input placeholder="banner10" id="upload_image10" type="text" size="25" name="buffercode_RBanner_text_banner10" value="<?php echo get_option('buffercode_RBanner_text_banner10') ?>" />
		<input class="upload_image_button" class="button" type="button" value="Upload Image" />
		<br />Enter a URL (with http://) or upload an image<br />
		<input placeholder="Link for that image"  type="text" size="25" name="buffercode_RBanner_url_banner10" value="<?php echo get_option('buffercode_RBanner_url_banner10') ?>" />
		</label>
	</td>
        </tr>
        
       <tr valign="top">
		<td></td>
		<td>Designed by - <a href="http://buffercode.com">Buffercode</a></td>
		<td></td>
        </tr>
	       <tr valign="top">
		   <td></td>
		   <td><?php submit_button();  ?></td>
		   <td></td>
        </tr>
    </table>
        

</form>
</div>
<?php 
} 

function buffercode_RBanner_uploader_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', plugins_url('js\upload-js.js',__FILE__), array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
}

function buffercode_RBanner_uploader_styles() {
wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'buffercode_RBanner_uploader_scripts');
add_action('admin_print_styles', 'buffercode_RBanner_uploader_styles'); 

register_deactivation_hook( __FILE__, 'buffercode_RBanner_deactive' );

function buffercode_RBanner_deactive() {
	delete_option( 'buffercode_RBanner_text_banner1' );
	delete_option( 'buffercode_RBanner_text_banner2' );
	delete_option( 'buffercode_RBanner_text_banner3' );
	delete_option( 'buffercode_RBanner_text_banner4' );
	delete_option( 'buffercode_RBanner_text_banner5' );
	delete_option( 'buffercode_RBanner_text_banner6' );
	delete_option( 'buffercode_RBanner_text_banner7' );
	delete_option( 'buffercode_RBanner_text_banner8' );
	delete_option( 'buffercode_RBanner_text_banner9' );
	delete_option( 'buffercode_RBanner_text_banner10' );
	delete_option( 'buffercode_RBanner_url_banner1' );
	delete_option( 'buffercode_RBanner_url_banner2' );
	delete_option( 'buffercode_RBanner_url_banner3' );
	delete_option( 'buffercode_RBanner_url_banner4' );
	delete_option( 'buffercode_RBanner_url_banner5' );
	delete_option( 'buffercode_RBanner_url_banner6' );
	delete_option( 'buffercode_RBanner_url_banner7' );
	delete_option( 'buffercode_RBanner_url_banner8' );
	delete_option( 'buffercode_RBanner_url_banner9' );
	delete_option( 'buffercode_RBanner_url_banner10' );
}

?>