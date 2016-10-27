<?php
// Add assets
if ( ! function_exists( 'admin_tabs_assets_fields_enqueue' ) ) :
	function admin_tabs_assets_fields_enqueue($hook) {
		if ( ! did_action( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}
		$name_component = 'wp-admin-tabs';
		$dir_component = basename(dirname(__DIR__));
		$dir_parent = basename(dirname(dirname(__DIR__)));
		if($dir_parent == 'plugins' || $dir_parent == 'mu-plugins'){
			wp_enqueue_style(
				$name_component,
				plugins_url( '/css/' . $name_component . '.css', __FILE__ ),
				array(),
				null
			);
			wp_enqueue_script(
				$name_component,
				plugins_url( '/js/' . $name_component . '.js', __FILE__ ),
				array('jquery'),
				null
			);
		} else {
			wp_enqueue_style(
				$name_component,
				get_template_directory_uri() . '/components/' . $dir_component . '/assets/css/' . $name_component . '.css',
				array(),
				null
			);
			wp_enqueue_script(
				$name_component,
				get_template_directory_uri() . '/components/' . $dir_component . '/assets/js/' . $name_component . '.js',
				array('jquery'),
				null
			);
		}
	}
endif;

if ( ! function_exists( 'admin_tabs_add_admin_assets' ) ) :
	function admin_tabs_add_admin_assets(){
		add_action('admin_enqueue_scripts', 'admin_tabs_assets_fields_enqueue');
	}
	add_action( 'admin_menu', 'admin_tabs_add_admin_assets' );
endif;
