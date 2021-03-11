<?php
/**
 * Plugin Name: Setup Source Display
 * Description: Add detail specs below single page or post
 * Version: 1.0.0
 * Author: Mark Corpuz
 * Author URI: https://smarterwebpackages.com
 * Network: true
 * License: GPL2
 */

/**
 * Source on Single Post
 * 
 */
function setup_source_display_single() {
    if ( is_singular() ) {
        echo '<div class="item source heading-ref" style="text-align: center;">Last Updated: '.get_the_modified_date( 'n.j.y' ).' | '.get_permalink().'</div>';
    }
}
add_action( 'genesis_footer', 'setup_source_display_single', 8 );