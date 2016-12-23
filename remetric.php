<?php

/*

Plugin Name: Remetric
Plugin URI: http://www.remetric.com
Description: Remetric is a suite of high-converting tools that help you to engage your visitors, personalize customer connections, and boost your profits.
Version: 1.0.0
Contributors: dallas22ca
Author: Dallas Read
Author URI: http://www.remetric.com
Text Domain: remetric
Tags: marketing, customer support, customer service, conversions, Call-To-Action, cta, hello bar, mailchimp, aweber, getresponse, subscribe, subscription, newsletter, sumo me, sumome, Remetric
Requires at least: 3.6
Tested up to: 4.1
Stable tag: trunk
License: MIT

Copyright (c) 2014-2016 Dallas Read.

*/

// ini_set("display_errors",1);
// ini_set("display_startup_errors",1);
// error_reporting(-1);

class Remetric {
  public static $remetric_instance;
  const version = '1.0.0';
  const debug = false;

  public static function init() {
    if ( is_null( self::$remetric_instance ) ) { self::$remetric_instance = new Remetric(); }
    return self::$remetric_instance;
  }

  private function __construct() {
    define('REMETRIC_ROOT', dirname(__FILE__));

    add_action( 'admin_init',                  array( $this, 'admin_init' ) );
    add_action( 'admin_menu',                  array( $this, 'menu_page' ) );

    add_action( 'wp_footer',                   array( $this, 'wp_footer' ) );

    add_action( 'wp_ajax_remetric_save_keys', array( $this, 'save_keys' ) );
  }

  public static function admin_init() {
    wp_enqueue_script( array( 'jquery' ) );
  }

  public static function wp_footer() {
    $marketing_publishable_key = get_option( 'remetric_publishable_key' );

    if (self::debug) {
      $remetric_api_url = 'http://api.lvh.me:3000';
      $marketing_url = 'http://localhost:9090/marketing.js';
    } else {
      $remetric_api_url = 'http://api.remetric.com';
      $marketing_url = 'http://cdn.remetric.com/marketing.js';
    }

    require_once 'marketing.php';
  }

  public static function menu_page() {
    add_menu_page( 'Remetric', 'Remetric', 7, 'remetric', array('Remetric', 'admin_page'), 'dashicons-chart-bar', 25 );
  }

  public static function admin_page() {
    $remetric_publishable_key = get_option( 'remetric_publishable_key' );
    $remetric_access_token = get_option( 'remetric_access_token' );
    $marketing_publishable_key = 'remetric';

    if (self::debug) {
      $remetric_admin_url = 'http://localhost:8080/remetric-admin.js';
      $remetric_api_url = 'http://api.lvh.me:3000';
      $marketing_url = 'http://localhost:9090/marketing.js';
    } else {
      $remetric_admin_url = 'http://cdn.remetric.com/remetric-admin.js';
      $remetric_api_url = 'http://api.remetric.com';
      $marketing_url = 'http://cdn.remetric.com/marketing.js';
    }

    require_once 'page.php';
  }

  public static function save_keys() {
    if (isset($_REQUEST['remetric_publishable_key'])) {
        $remetric_publishable_key = esc_attr($_REQUEST['remetric_publishable_key']);
        update_option( 'remetric_publishable_key', $remetric_publishable_key );
    }

    if (isset($_REQUEST['remetric_access_token'])) {
        $remetric_access_token = esc_attr($_REQUEST['remetric_access_token']);
        update_option( 'remetric_access_token', $remetric_access_token );
    }

    die();
  }
}

// delete_option('remetric_access_token');
// delete_option('remetric_publishable_key');
Remetric::init();

?>
