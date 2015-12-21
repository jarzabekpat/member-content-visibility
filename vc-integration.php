<?php
namespace MemberContentVisibility {

  class VCIntegration {

    public static function init() {
      add_action('vc_before_init', array(__CLASS__, 'vc_integration_member_container'));
    }

    /**
    * Funtion to integrate http method shortcode as a container in visual composer
    */
    public static function vc_integration_member_container() {
      vc_map( array(
        "name" => __("(non) Member Container", "vc-member-container"),
        "base" => "member_container",
        "icon" => plugins_url('member-content-visibility')."/images/mcv_icon.jpg",
        "class" => "",
        "description" => __('Show content only to members or non-members',
          'vc-member-container'),
        "as_parent" => array('except' => ''),
        "category" => __('Content', 'vc-member-container'),
        "params" => array(
          array(
            "type" => "dropdown",
            "heading" => __("Show to", "vc-member-container"),
            "param_name" => "show",
            "value" => array(
              'Members' => 'members',
              'Non-members' => 'non-members'
            ),
            "description" => __("Container to show content to members or non-members", "vc-member-container")
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
  if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_member_container extends WPBakeryShortCodesContainer {
    }
  }
}
?>
