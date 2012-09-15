<?php

/*
Plugin Name: Pilates Tweaks
Plugin URI: 
Description: This plugin adds iOS specific CSS and trademarking for Gyrotonics&reg;.
Version: 0.1
Author: Andy Fragen
Author URI: http://thefragens.com/blog/
License: GNU General Public License v2
License URI: http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*/


add_action('wp_footer', 'gyrotonic_disclaimer');
function gyrotonic_disclaimer() {
  $content = "";
  if ( is_page('CONTACT')) {
    $content = '<div id="gyrotonic_disclaimer"><span class="gyrotonic">GYROTONIC</span>, <span class="gyrotonic">GYROKINESIS</span>, <span class="gyrotonic">GYROTONIC EXPANSION SYSTEM</span> & <span class="gyrotonic">GYROTONER</span> are registered trademarks of the Gyrotonic Sales Corp, and are used with their permission.</div>';
  } 
  echo $content;
}

add_action( 'wp_enqueue_scripts', 'add_pilates_css', 999 );
function add_pilates_css() {
	wp_register_style( 'pilates', plugin_dir_url(__FILE__) . 'pilates.css' );
	wp_enqueue_style( 'pilates' );
}



// GithubUpdater
if ( is_admin() ) {
	global $wp_version;
	include_once( 'updater.php' );
	$config = array(		
		'slug' => plugin_basename(__FILE__),
		'proper_folder_name' => dirname( plugin_basename(__FILE__) ),
		'api_url' => 'https://api.github.com/repos/afragen/pilates-tweaks',
		'raw_url' => 'https://raw.github.com/afragen/pilates-tweaks/master',
		'github_url' => 'https://github.com/afragen/pilates-tweaks',
		'zip_url' => 'https://github.com/afragen/pilates-tweaks/zipball/master',
		'sslverify' => true,
		'requires' => $wp_version,
		'tested' => $wp_version,
		'readme' => 'readme.txt'

	);
	new WPGitHubUpdater($config);
}

?>