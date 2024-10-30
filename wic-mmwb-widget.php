<?php
/*
Plugin Name: WorkInConfidence Make My Work Better Shortcode
Plugin URI: https://www.workinconfidence.com
Description: Allows insertion of the MMWB widget in a post or page
Version: 1.0
Author: WorkInConfidence
Author URI: https://www.workinconfidence.com
*/

add_shortcode( 'wicmmwbw', 'wic_mmwb_widget' );
add_action( 'wp_enqueue_scripts', 'wic_queue_stylesheet_mmwbw');

function wic_queue_stylesheet_mmwbw() {
  wp_enqueue_style('mmwbw_stylesheet', plugins_url('stylesheet.css', __FILE__), array(), '1.2');
}

function wic_mmwb_widget( $atts = [], $content = null, $tag = '' ) {

    // normalize attribute keys, lowercase
    $atts = array_change_key_case((array)$atts, CASE_LOWER);

    // override default attributes with user attributes
    $wporg_atts = shortcode_atts([
                                     'key' => 'none',
                                 ], $atts, $tag);

    $output = ' <!— Start widget code -->
                <div class="resp-iframe-holder">
                    <iframe id="myIframe" class="resp-iframe" src="https://makemyworkbetter.com/widget/'.$wporg_atts['key'].'" scrolling="no" gesture="media"  onload="iFrameResize()" allow="encrypted-media" allowfullscreen></iframe>
                  <script src="https://makemyworkbetter.com/js/iframeResizer.min.js"></script>
                </div>
                <!— Finish widget code -->';

  return $output;
}
