<?php
namespace MemberContentVisibility;

class Shortcodes {

  public static function init() {
    add_shortcode('member_container', array(__CLASS__, 'member_container_shortcode'));
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
        f (!is_user_logged_in() || current_user_can('administrator'))
          return do_shortcode($content);
        break;
    }
  }
}
