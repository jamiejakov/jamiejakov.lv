<?php
/*
 * Plugin Name: Remove Yoast SEO comments
 * Plugin URI: https://wordpress.org/plugins/remove-yoast-seo-comments/
 * Description: Removes the Yoast SEO advertisement HTML comments from your front-end source code.
 * Version: 2.0.4
 * Author: Mitch
 * Author URI: https://profiles.wordpress.org/lowest
 * License: GPL-2.0+
 * Text Domain: rysc
 * Domain Path:
 * Network:
 * License: GPL-2.0+
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

$GLOBALS['rysc_opts'] = get_option('rysc_options', array());

function rysc_bundle() {
	if(defined( 'WPSEO_VERSION' ) && class_exists( 'WPSEO_Frontend' )) {
		if(method_exists( 'WPSEO_Frontend', 'debug_mark' ) && version_compare( WPSEO_VERSION, '4.4', '>=' )) { // for Yoast SEO 4.4 or later
			remove_action( 'wpseo_head', array( WPSEO_Frontend::get_instance(), 'debug_mark' ) , 2);
			
			remove_action( 'wp_head', array( WPSEO_Frontend::get_instance(), 'head' ) , 1);
			add_action( 'wp_head', 'rysc_rewrite_head' , 1);
			
			add_action( 'init', 'rysc_xml_parser', 999 );
		} elseif(method_exists( 'WPSEO_Frontend', 'debug_marker' ) && version_compare( WPSEO_VERSION, '4.3', '<=' )) { // for Yoast SEO 4.3 or earlier
			remove_action( 'wpseo_head', array( WPSEO_Frontend::get_instance(), 'debug_marker' ) , 2);
			
			remove_action( 'wp_head', array( WPSEO_Frontend::get_instance(), 'head' ) , 1);
			add_action( 'wp_head', 'rysc_rewrite_head' , 1);
			
			add_action( 'init', 'rysc_xml_parser', 999 );
		} else { // looks like we have no compatible solutions for now
			add_action( 'wp_head', 'rysc_parser', 999 );
			
			add_action( 'init', 'rysc_xml_parser', 999 );
		}
	}
}
add_action( 'init', 'rysc_bundle');

function rysc_rewrite_head() {
	$rewrite = new ReflectionMethod( 'WPSEO_Frontend', 'head' );

	$filename = $rewrite->getFileName();
	$start_line = $rewrite->getStartLine();
	$end_line = $rewrite->getEndLine()-1;

	$length = $end_line - $start_line;
	$source = file($filename);
	$body = implode("", array_slice($source, $start_line, $length));
	$body = preg_replace( '/echo \'\<\!(.*?)\n/', '', $body);

	eval($body);
}

function rysc_xml_parser() {
	$ext = pathinfo($_SERVER['REQUEST_URI'], PATHINFO_EXTENSION);

	if($ext == 'xml') {
		$flush = ob_get_contents() ? ob_end_clean() : '';

		ob_start(function( $buffer ) {
			return preg_replace( '/\n?<.*?yoast.*?>/mi', '', $buffer ) . $flush;
		});
	}
}

function rysc_parser() {
	$current_cont = ob_get_contents();
	
	ob_clean();
		
	if(empty($GLOBALS['rysc_opts']['phrase_for_'.WPSEO_VERSION])){
		preg_match_all('/(\n|)\<\!\-\-(.*?)yoast seo(.*?)\-\-\>/i', $current_cont, $result);
		
		if (!empty($result[0])) {
			if (!empty($result[0][0])) {
				$GLOBALS['rysc_opts']['phrase_for_'.WPSEO_VERSION]['line1'] = $first_line = $result[0][0];
			}
			if (!empty($result[0][1])) {
				$GLOBALS['rysc_opts']['phrase_for_'.WPSEO_VERSION]['line2'] = $second_line = $result[0][1];
			}
		}

		update_option('rysc_options', $GLOBALS['rysc_opts']);
	} else {
		$first_line 	= $GLOBALS['rysc_opts']['phrase_for_'.WPSEO_VERSION]['line1'];
		$second_line 	= $GLOBALS['rysc_opts']['phrase_for_'.WPSEO_VERSION]['line2'];
	}

	$current_cont = str_replace( $first_line, '', $current_cont );
	$current_cont = str_replace( $second_line, '', $current_cont );

	echo $current_cont;
}

function rysc_links( $link ) {
	return array_merge( $link, array('<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2VYPRGME8QELC" target="_blank" rel="noopener noreferrer">' . __('Donate') . '</a>') );
}
add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'rysc_links');