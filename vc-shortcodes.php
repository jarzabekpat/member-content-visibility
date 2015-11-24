<?php
namespace VCMembersContainer {

  class VCShortcodes {

    public static function init() {
      add_shortcode('member_container', array(__CLASS__, 'member_container_shortcode'));
      add_action('vc_before_init', array(__CLASS__, 'vc_integration_member_container'));
    }

    /**
    * member container shortcode (Enclosing shortcode)
    * atts:
    *     - show: determine to who show the content
    *             (possible values: members, non-members)
    */
    public static function member_container_shortcode($atts, $content = null) {
      $atts = shortcode_atts( array(
        'show' => 'members',
      ), $atts);

      switch ($atts['show']) {
        case 'members':
          if (is_user_logged_in())
            return do_shortcode($content);
          break;
        case 'non-members':
          if (!is_user_logged_in())
            return do_shortcode($content);
          break;
      }
    }

    /**
    * Funtion to integrate http method short code as a container in visual composer
    */
    public static function vc_integration_member_container() {
      vc_map( array(
        "name" => __("(non) Member Container", "vc-member-container"),
        "base" => "member_container",
        "description" => __('Insert content to show only to logged in or non-logged in users',
          'vc-member-container'),
        "as_parent" => array('except' => ''),
        "category" => __('Member Container', 'vc-member-container'),
        "params" => array(
          array(
            "type" => "dropdown",
            "heading" => __("Show to", "vc-member-container"),
            "param_name" => "show",
            "value" => array(
              'Members' => 'members',
              'Non-members' => 'non-members'
            ),
            "description" => __("Container to show content to members or non-members", "cloudexchange_documentation")
          )
        ),
        "js_view" => 'VcColumnView'
      ));
    }
  }
}

namespace {
  /**
  * Necessary class to container element works
  */
  class WPBakeryShortCode_member_container extends WPBakeryShortCodesContainer {
  }
}
