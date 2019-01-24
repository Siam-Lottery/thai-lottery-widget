<?php
/*
Plugin Name: Thai Lottery Widget
Plugin URI: https://www.lottery.co.th/code
Description: แสดงผลสลากกินแบ่งรัฐบาลไทย พร้อมระบบตรวจหวยงวดล่าสุด ==เพิ่มการแสดงผล Widget ได้ที่หน้า <a href="widgets.php">วิดเจ็ต</a>== =*การใช้งาน Shortcode*=  <strong>[thailottery width="100%" height="650"]</strong> นำโค้ดนี้ไปวางในส่วนของหน้าเพจหรือหน้าเนื้อหาเพื่อแสดงผล *** width=ความกว้าง ค่าปกติ 100%, height=ความสูง ค่าปกติ 650  และการแสดงผลสลากย้อนหลัง <strong>[lottofeed]</strong> สำหรับการแสดงผล 10 งวดล่าสุด ** จำกัดจำนวนงวดดังนี้ <strong>[lottofeed numbers="5"]</strong> หมายเลข 5 คือจำนวนงวดที่ต้องการให้แสดง
Version: 2.0
Author: siamlottery
Author URI: https://www.lottery.co.th
License: GPL2
*/
?>
<?php
class wp_thailottery_plugin extends WP_Widget {
	// constructor
	function __construct() {
			parent::__construct(
			'wp_thailottery_plugin', // Base ID
			'Thai Lottery Widget: style 1', // Name
			array( 'description' => 'widget สำหรับการแสดงผลสลากกินแบ่งรัฐบาลรูปแบบที่ 1 นำไปวางในส่วนที่ท่านต้องการให้แสดงผล.' ) // Args
		);
}
function form($instance) {
if( $instance) {
     $title = esc_attr($instance['title']);
     $width = esc_attr($instance['width']);
     $height = esc_attr($instance['height']);
} else {
     $title = '';
     $width = '100%';
     $height = '650';
}
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('หัวข้อ', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('ขนาดความกว้าง', 'wp_widget_plugin'); ?></label>
(ค่าปกติ 100%)
<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('ขนาดความสูง', 'wp_widget_plugin'); ?></label>
(ค่าปกติ 650)
<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
</p>
<p>
การใช้งาน Shortcode<br/>
<strong>[thailottery width="100%" height="650"]</strong><br/>
นำโค้ดด้านบนนี้ไปวางในส่วนของหน้าเพจหรือหน้าเนื้อหาเพื่อแสดงผล
<br/><em>width=ความกว้าง ค่าปกติ 100%, height=ความสูง ค่าปกติ 650</em>
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
$mywidth='100%';
}
  if($height) {
      $myheight=$height;
   }else{
$myheight='650';
}
   echo '<iframe src=https://www.lottery.co.th/share width='.$mywidth.' height='.$myheight.' frameborder=0></iframe>';
   echo $after_widget;
}
}


class wp_thailottery_plugin2 extends WP_Widget {


	// constructor
	function __construct() {
			parent::__construct(
			'wp_thailottery_plugin2', // Base ID
			'Thai Lottery Widget: style 2 (Only results)', // Name
			array( 'description' => 'widget สำหรับการแสดงผลเฉพาะสลากกินแบ่งรัฐบาลอย่างเดียว (Only results).' ) // Args
		);
}
function form($instance) {
if( $instance) {
     $title = esc_attr($instance['title']);
     $width = esc_attr($instance['width']);
     $height = esc_attr($instance['height']);
} else {
     $title = '';
     $width = '100%';
     $height = '340';
}
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('หัวข้อ', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('ขนาดความกว้าง', 'wp_widget_plugin'); ?></label>
(ค่าปกติ 100%)
<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('ขนาดความสูง', 'wp_widget_plugin'); ?></label>
(ค่าปกติ 340)
<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
</p>
<p>
การใช้งาน Shortcode สำหรับเฉพาะสลากกินแบ่งรัฐบาลอย่างเดียว<br/>
<strong>[thailottery2] หรือปรับแต่งขนาด [thailottery2 width="100%" height="340"]</strong><br/>
นำโค้ดด้านบนนี้ไปวางในส่วนของหน้าเพจหรือหน้าเนื้อหาเพื่อแสดงผล
<br/><em>width=ความกว้าง ค่าปกติ 100%, height=ความสูง ค่าปกติ 340</em>
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
   if ( $title ) {
      echo $before_title . $title . $after_title;
   }
  if($width) {
      $mywidth=$width;
   }else{
$mywidth='100%';
}
  if($height) {
      $myheight=$height;
   }else{
$myheight='340';
}
   echo '<iframe src=https://www.lottery.co.th/show width='.$mywidth.' height='.$myheight.' frameborder=0></iframe>';
   echo $after_widget;
}
}

//show small size
class wp_thailottery_plugin3 extends WP_Widget {
	// constructor
	function __construct() {
			parent::__construct(
			'wp_thailottery_plugin3', // Base ID
			'ขนาดเล็กพิเศษ : Thai Lottery Widget style 3', // Name
			array( 'description' => 'widget แสดงผลสลากกินแบ่งขนาดเล็กพิเศษ (Only results).' ) // Args
		);
}
function form($instance) {
if( $instance) {
     $title = esc_attr($instance['title']);
     $width = esc_attr($instance['width']);
     $height = esc_attr($instance['height']);
} else {
     $title = '';
     $width = '210';
     $height = '290';
}
?>
<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('หัวข้อ', 'wp_widget_plugin'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('width'); ?>"><?php _e('ขนาดความกว้าง', 'wp_widget_plugin'); ?></label>
(ค่าปกติ 210)
<input class="widefat" id="<?php echo $this->get_field_id('width'); ?>" name="<?php echo $this->get_field_name('width'); ?>" type="text" value="<?php echo $width; ?>" />
</p>
<p>
<label for="<?php echo $this->get_field_id('height'); ?>"><?php _e('ขนาดความสูง', 'wp_widget_plugin'); ?></label>
(ค่าปกติ 290)
<input class="widefat" id="<?php echo $this->get_field_id('height'); ?>" name="<?php echo $this->get_field_name('height'); ?>" type="text" value="<?php echo $height; ?>" />
</p>
<p>
การใช้งาน Shortcode ขนาดเล็กพิเศษ<br/>
<strong>[thailottery3] หรือปรับแต่งขนาด [thailottery3 width="210" height="290"]</strong><br/>
นำโค้ดด้านบนนี้ไปวางในส่วนของหน้าเพจหรือหน้าเนื้อหาเพื่อแสดงผล
<br/><em>width=ความกว้าง ค่าปกติ 210, height=ความสูง ค่าปกติ 290</em>
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
   if ( $title ) {
      echo $before_title . $title . $after_title;
   }
  if($width) {
      $mywidth=$width;
   }else{
$mywidth='210';
}
  if($height) {
      $myheight=$height;
   }else{
$myheight='290';
}
   echo '<iframe src=https://www.lottery.co.th/small width='.$mywidth.' height='.$myheight.' frameborder=0></iframe>';
   echo $after_widget;
}
}

function sthailottery($atts, $content = null ) {
    $a = shortcode_atts( array(
        'width' => '100%',
        'height' => '650',
    ), $atts );
       return '<iframe src=https://www.lottery.co.th/share width='.$a['width'].' height='.$a['height'].' frameborder=0></iframe>';
}
function sthailottery2($atts, $content = null ) {
    $a = shortcode_atts( array(
        'width' => '100%',
        'height' => '340',
    ), $atts );
       return '<iframe src=https://www.lottery.co.th/show width='.$a['width'].' height='.$a['height'].' frameborder=0></iframe>';
}
function sthailottery3($atts, $content = null ) {
    $a = shortcode_atts( array(
        'width' => '210',
        'height' => '290',
    ), $atts );
       return '<iframe src=https://www.lottery.co.th/small width='.$a['width'].' height='.$a['height'].' frameborder=0></iframe>';
}
function rssthailottery($atts, $content = null ) {
    $a = shortcode_atts( array(
        'numbers' => '10',
    ), $atts );
    $i = 0;
	$url = "https://www.lottery.co.th/lotto/feed";
	ob_start();
	$rss = simplexml_load_file($url);
	foreach($rss->channel->item as $item) { if ($i < $a['numbers']) { 
	print '<h3><a href="'.$item->link.'" title="'.$item->title.'">'.$item->title.'</a></h3><br />'.$item->description.''; } $i++; 
	}
	$output = ob_get_clean();
	return $output;
}
add_shortcode('thailottery', 'sthailottery');
add_shortcode('thailottery2', 'sthailottery2');
add_shortcode('thailottery3', 'sthailottery3');
add_shortcode('lottofeed', 'rssthailottery');
// register widget
add_action('widgets_init', create_function('', 'return register_widget("wp_thailottery_plugin");'));
add_action('widgets_init', create_function('', 'return register_widget("wp_thailottery_plugin2");'));
add_action('widgets_init', create_function('', 'return register_widget("wp_thailottery_plugin3");'));
?>
