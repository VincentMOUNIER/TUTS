<?php
/*
Plugin Name: TUTS Database Manage

Description: Plugin de test
Version: 0.1
Author: Phommavanh Kevin
License: GPL2
*/

class Tuts_Plugin {
  public function __construct() {

    include_once plugin_dir_path(__FILE__).'/newsletter.php';
    new Tuts_Newsletter();
    register_activation_hook(__FILE__, array('Tuts_Newsletter','install'));
    add_action('admin_menu',array($this, 'add_admin_menu'));



  }

  public function add_admin_menu(){
    add_menu_page('First Plugin','TUTS Management','manage_options','tuts',array($this, 'menu_html'));
    add_submenu_page('tuts','Welcome','Welcome','manage_options','tuts',array($this, 'menu_html'));
  }

  public function menu_html(){
    echo '<h1>'.get_admin_page_title().'</h1>';
    echo '<p> Welcome here </p>';
  }
}

new Tuts_plugin();

?>
