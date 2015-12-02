<?php
/**
 * Plugin Name: Member Content Visibility
 * Description: Add shortcode that allows to display content parts to logged in or non-logged in users. Also includes integration with visual composer
 * Version: 0.1
 * Author: Webilop
 * Author URI: http://webilop.com
 * License: GPL2
 * Text Domain: vc-member-container
 */
namespace VCMembersContainer;

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

defined('ABSPATH') or die("No script kiddies please!");
class VCMembersContainer {

  public static function init() {
    //load vc element after js_composer plugin is loaded
    add_action('plugins_loaded', function(){
      include ('vc-shortcodes.php');
      
      VCShortcodes::init();  
      
    });
      
    $plugin = "js_composer/js_composer.php";
    
    /*if visual composer plugin is active, it is enabled the integration*/
    if(is_plugin_active($plugin)){
      include ('vc-integration.php');
    }
  }

}

VCMembersContainer::init();
?>
