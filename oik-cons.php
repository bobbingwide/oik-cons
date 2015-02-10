<?php
/*
Plugin Name: oik-cons
Plugin URI: http://www.oik-plugins.com/oik-plugins/oik-cons
Description: dash icons, genericons, buddicons and texticons
Version: 0.1
Author: bobbingwide
Author URI: http://www.oik-plugins.com/author/bobbingwide
License: GPL2

    Copyright 2014, 2015 Bobbing Wide (email : herb@bobbingwide.com )

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License version 2,
    as published by the Free Software Foundation.

    You may NOT assume that you can use any other version of the GPL.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    The license for this software can likely be found here:
    http://www.gnu.org/licenses/gpl-2.0.html

*/
/**
 * Implement "oik_add_shortcodes" for oik-cons
 *
 * oik-cons is a subset of oik-bob-bing-wide shortcodes supporting [bw_dash]
 * It doesn't matter in which order the plugins are initialised. 
 * Both will register the same named function to expand the shortcode
 * At some time in the future the file will be removed from oik-bob-bing-wide
 *  
 */
function oik_cons_init() {
  bw_add_shortcode( "bw_dash", "bw_dash", oik_path( "shortcodes/oik-dash.php", "oik-cons" ), true );
}

/**
 * Implement "oik_admin_menu" action for oik-cons
 * 
 * Set the plugin server. Not necessary for a plugin from wordpress.org    
 *
 */
function oik_cons_admin_menu() {
  //oik_register_plugin_server( __FILE__ );
}

/**
 * Implememt "admin_notices" action for oik-cons
 * 
 */ 
function oik_cons_activation() {
  static $plugin_basename = null;
  if ( !$plugin_basename ) {
    $plugin_basename = plugin_basename(__FILE__);
    add_action( "after_plugin_row_oik-cons/oik-cons.php", "oik_cons_activation" );   
    if ( !function_exists( "oik_plugin_lazy_activation" ) ) { 
      require_once( "admin/oik-activation.php" );
    }
  }  
  $depends = "oik:2.4";
  oik_plugin_lazy_activation( __FILE__, $depends, "oik_plugin_plugin_inactive" );
}

/** 
 * Function to invoke when oik-cons is loaded 
 */
function oik_cons_loaded() {
  add_action( "oik_add_shortcodes", "oik_cons_init" );
  add_action( "admin_notices", "oik_cons_activation" );
  //add_action( "oik_admin_menu", "oik_cons_admin_menu" );
}

oik_cons_loaded();






