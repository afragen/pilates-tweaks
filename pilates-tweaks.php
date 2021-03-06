<?php

/*
Plugin Name: Pilates Tweaks
Plugin URI: https://github.com/afragen/pilates-tweaks
GitHub Plugin URI: https://github.com/afragen/pilates-tweaks
Description: This plugin adds iOS specific CSS and trademarking for Gyrotonics&reg;.
Version: 0.4
Author: Andy Fragen
Author URI: http://thefragens.com/blog/
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/


add_action('wp_footer', 'gyrotonic_disclaimer');
function gyrotonic_disclaimer() {
	wp_reset_query();
	$content = "";
	if ( is_page('CONTACT')) {
    	$content = '<div id="gyrotonic_disclaimer"><span class="gyrotonic">Gyrotonic</span>, <span class="gyrotonic">Gyrokinesis</span>, <span class="gyrotonic">Gyrotonic Expansion System</span> & <span class="gyrotonic">Gryotoner</span> are registered trademarks of the Gyrotonic Sales Corp, and are used with their permission.</div>';
	} 
  	echo $content;
}

add_action( 'wp_enqueue_scripts', 'add_pilates_css', 999 );
function add_pilates_css() {
	wp_register_style( 'pilates', plugin_dir_url(__FILE__) . 'pilates.css' );
	wp_enqueue_style( 'pilates' );
}


