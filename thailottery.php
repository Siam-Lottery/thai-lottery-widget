<?php
/*
Plugin Name: Thai Lottery Widget
Plugin URI: https://www.lottery.co.th/code
Description: แสดงผลสลากกินแบ่งรัฐบาลไทย พร้อมระบบตรวจหวยงวดล่าสุด ==เพิ่มการแสดงผล Widget ได้ที่หน้า <a href="widgets.php">วิดเจ็ต</a>== =*การใช้งาน Shortcode*=  <strong>[thailottery width="300" height="640"]</strong> นำโค้ดนี้ไปวางในส่วนของหน้าเพจหรือหน้าเนื้อหาเพื่อแสดงผล *** width=ความกว้าง ค่าปกติ 300, height=ความสูง ค่าปกติ 640
Version: 1.2
Author: siamlottery
Author URI: https://www.lottery.co.th
License: GPL2
*/
?>
<?php
class wp_thailottery_plugin extends WP_Widget {


	// constructor
	function __construct() {
	$widget_ops = array('classname' => 'wp_thailottery_plugin', 'description' => __('widget สำหรับการแสดงผลสลากกินแบ่งรัฐบาล นำไปวางในส่วนที่ท่านต้องการให้แสดงผล', 'wp_widget_plugin'));
	$control_ops = array('width' => 400, 'height' => 300);
	parent::WP_Widget(false, $name = __('Thai Lottery Widget: โค้ดตรวจหวย', 'wp_widget_plugin'), $widget_ops, $control_ops );
}
/*
 function wp_thailottery_plugin() {
        parent::WP_Widget(false, $name = __('Thai Lottery Widget: โค้ดตรวจหวย', 'wp_widget_plugin') );
    }
*/
// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
     $width = esc_attr($instance['width']);
     $height = esc_attr($instance['height']);
} else {
     $title = '';
     $width = '300';
     $height = '640';
}
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('หัวข้อ', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('ขนาดความกว้าง', 'wp_widget_plugin'); ?></label>
(ค่าปกติ 300)
<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('ขนาดความสูง', 'wp_widget_plugin'); ?></label>
(ค่าปกติ 640)
<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
</p>
<p>
การใช้งาน Shortcode<br/>
<strong>[thailottery width="300" height="640"]</strong><br/>
นำโค้ดด้านบนนี้ไปวางในส่วนของหน้าเพจหรือหน้าเนื้อหาเพื่อแสดงผล
<br/><em>width=ความกว้าง ค่าปกติ 300, height=ความสูง ค่าปกติ 640</em>
</p>
<?php
}

// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['height'] = strip_tags($new_instance['height']);
      $instance['width'] = strip_tags($new_instance['width']);
     return $instance;
}

// display widget
function widget($args, $instance) {
   extract( $args );
     $width = $instance[ 'width' ];
     $height = $instance[ 'height' ];
   $title = apply_filters('widget_title', $instance['title']);
   echo $before_widget;
   //echo '<div class="widget-text wp_widget_plugin_box">';

   // Check if title is set
   if ( $title ) {
      echo $before_title . $title . $after_title;
   }
  if($width) {
      $mywidth=$width;
   }else{
$mywidth='300';
}
  if($height) {
      $myheight=$height;
   }else{
$myheight='640';
}
   echo '<iframe src=https://www.lottery.co.th/share width='.$mywidth.' height='.$myheight.' frameborder=0></iframe>';
   echo $after_widget;
}
}

function sthailottery($atts, $content = null ) {
    $a = shortcode_atts( array(
        'width' => '300',
        'height' => '640',
    ), $atts );
       return '<iframe src=https://www.lottery.co.th/share width='.$a['width'].' height='.$a['height'].' frameborder=0></iframe>';
}
add_shortcode('thailottery', 'sthailottery');
// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_thailottery_plugin");'));
?>
