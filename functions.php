<?php
if( !defined('ABSPATH') ) die();

/****** DASHBOARD SETTINGS ******/

/* remove dashboard footer text */
add_action('admin_footer_text', 'remove_admin_footer');
function remove_admin_footer() {
  return;
}

/* remove unused menupoints from dashboard */
add_action( 'admin_menu', 'remove_dashboard_menupoints' );
function remove_dashboard_menupoints(){
   remove_menu_page( 'tools.php' );                  //Tools
   remove_menu_page( 'edit-comments.php' );          //Comments
   // remove_menu_page( 'index.php' );                  //Dashboard
   // remove_menu_page( 'edit.php' );                   //Posts
   // remove_menu_page( 'upload.php' );                 //Media
   // remove_menu_page( 'edit.php?post_type=page' );    //Pages
   // remove_menu_page( 'themes.php' );                 //Appearance
   // remove_menu_page( 'plugins.php' );                //Plugins
   // remove_menu_page( 'users.php' );                  //Users
   // remove_menu_page( 'options-general.php' );        //Settings
}

/* remove top bar elements for administartors */
add_action( 'wp_before_admin_bar_render', 'remove_top_bar_elements' );
function remove_top_bar_elements() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo');
	$wp_admin_bar->remove_menu('comments'); // optional, delete comments as many websites don't even have those enabled.
}

/* hide help tab from admin dashboard */
add_action( 'contextual_help', 'wpse50723_remove_help', 999, 3 );
function wpse50723_remove_help($old_help, $screen_id, $screen){
	$screen->remove_help_tabs();
	return $old_help;
}

/****** THEME SETTINGS ******/

/* add menu to the theme */
add_action( 'after_setup_theme', 'register_menus' );
function register_menus() {
    register_nav_menu( 'header-menu', __( 'Header Menu', 'lktbl-headless' ) );
}
