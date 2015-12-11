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
namespace MemberContentVisibility;

defined('ABSPATH') or die("No script kiddies please!");
class VCMembersContainer {

  public static function init() {
    //Add shortcodes
    include ('shortcodes.php');
    Shortcodes::init();

    add_action('plugins_loaded', array(__CLASS__, 'check_visual_composer_plugin'));
  }

  public static function check_visual_composer_plugin(){
    $plugin = "js_composer/js_composer.php";

    /*if visual composer plugin is active, then it is enabled the integration*/
    if(is_plugin_active($plugin)){
      include ('vc-integration.php');
      VCIntegration::init();
    }
  }
}

VCMembersContainer::init();
?>
