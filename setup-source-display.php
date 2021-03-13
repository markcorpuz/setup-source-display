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
	if( is_user_logged_in() ) {
        global $post;
        //echo '<div class="item source heading-ref" style="text-align: center;">Last Updated: '.get_the_modified_date( 'n.j.y' ).' | '.get_permalink().'</div>';
		echo '<div class="item source">Last Updated: '.get_the_modified_date( 'n.j.y' ).' | '.$post->post_name.'</div>';
    }
}
add_action( 'genesis_header_right', 'setup_source_display_single', 8 );

/**
 * Display Categories
 * 
 */
function setup_source_display_get_categories() {
	if( is_user_logged_in() ) {
		$categories = get_categories( array(
		    'orderby' => 'name',
		    'order'   => 'ASC'
		) );
		
		echo '<div class="grid-5columns grid-gap-zero fontsize-smaller" style="max-width: 768px;margin-left:auto;margin-right:auto;margin-bottom:1rem;">';
		foreach( $categories as $category ) {
		    $category_link = sprintf( 
		        '<a style="text-decoration:none;" href="%1$s" alt="%2$s">%3$s</a>',
		        esc_url( get_category_link( $category->term_id ) ),
		        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
		        esc_html( $category->name )
		    );

		    echo '<div>' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) .' '. sprintf( esc_html__( '%s', 'textdomain' ), $category->count ) . '</div>';
		} 
		echo '</div>';
	}
}
add_action( 'genesis_footer', 'setup_source_display_get_categories', 8 );