<?php
/*
	Plugin Name: Custom WP
	Description: Customise WordPress
	Version: 1
	Author: Howard Marsden
	Author URI: http://sourcecreative.co.uk
*/

function hide_posts_and_comments() {
    remove_menu_page('edit.php');          // Posts
    remove_menu_page('edit-comments.php'); // Comments
}
add_action('admin_menu', 'hide_posts_and_comments');

function dashboard_footer () {
	return "<span class='credit'>Animo ".date('Y')."</span>";
}
add_filter('admin_footer_text', 'dashboard_footer');

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
  
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;
 
wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}
 
function custom_dashboard_help() {
echo '<p>Need help? Contact the developer <a href="mailto:howard@sourcecreative.co.uk">here</a>.</p>';
}

function remove_dashboard_widgets() {
	global $wp_meta_boxes;	
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_drafts']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
}

add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

//TINYMCE

function my_plugin_add_editor_styles($init_array) {
    $style_url = get_template_directory_uri() . '/css/admin.css?v=' . time();

    if (!empty($init_array['content_css'])) {
        $init_array['content_css'] .= ',' . $style_url;
    } else {
        $init_array['content_css'] = $style_url;
    }

    return $init_array;
}
add_filter('tiny_mce_before_init', 'my_plugin_add_editor_styles');


function wpTinyChanges($arr){
    $arr['block_formats'] = 'Paragraph=p;Heading=h3;Subheading=h4;Subsubheading=h5';
    return $arr;
  }
add_filter('tiny_mce_before_init', 'wpTinyChanges');

function fb_mce_editor_buttons( $buttons ) {

    array_unshift( $buttons, 'styleselect' );
    return $buttons;
} 
add_filter( 'mce_buttons_2', 'fb_mce_editor_buttons' );

function fb_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Large Type',
            'selector' => 'p',
            'classes' => 'large'
            ),      
       array(
         'title' => 'Link Button',
         'selector' => 'p',
         'classes' => 'link-button'
       )	                           
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}
add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );	




?>