<?php
// Add assets
if ( ! function_exists( 'admin_tabs_assets_fields_enqueue' ) ) :
	function admin_tabs_assets_fields_enqueue($hook) {
		if ( ! did_action( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}
		$dir_parent = basename(dirname(__DIR__));
		if($dir_parent == 'plugins' || $dir_parent == 'mu-plugins'){
			wp_enqueue_style( 'wp-admin-tabs', plugins_url( '/assets/css/wp-admin-tabs.css', __FILE__ ) );
			wp_enqueue_script( 'wp-admin-tabs', plugins_url( '/assets/js/wp-admin-tabs.js', __FILE__ ) , array('jquery', 'hoverIntent') );
		} else {
			wp_enqueue_style( 'wp-admin-tabs', get_template_directory_uri() . '/components/wp-admin-tabs/assets/css/wp-admin-tabs.css' );
			wp_enqueue_script( 'wp-admin-tabs', get_template_directory_uri() . '/components/wp-admin-tabs/assets/js/wp-admin-tabs.js' , array('jquery') );
		}
	}
endif;

if ( ! function_exists( 'admin_tabs_add_admin_assets' ) ) :
	function admin_tabs_add_admin_assets(){
		add_action('admin_enqueue_scripts', 'admin_tabs_assets_fields_enqueue');
	}
	add_action( 'admin_menu', 'admin_tabs_add_admin_assets' );
endif;
