<?php
/**
 * This controls the plugin
 * @package  JA
 */

class Brewers {

	public function __construct() {
		$this->load_includes();
		$this->load_assets();
	}

	//Include admin and Public files
	public function load_includes() {
		include_once( plugin_dir_path( __FILE__ ) . 'admin/brewers-post-type.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'admin/brewers-settings.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'admin/brewers-meta-boxes.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'admin/brewers-form-ajax.php' );
		include_once( plugin_dir_path( __FILE__ ) . 'public/brewers-shortcode.php' );
	}

	public function load_assets() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_assets' ) );
	}

	public function register_assets() {
		//css
		wp_enqueue_style( 'brewers-css', plugin_dir_url( __FILE__ ) . 'css/main.css', array(), '1.0' );
	}

	public function register_admin_assets() {
		if (($_GET['page'] ?? '') == 'brewers-settings') {
			//css
			wp_enqueue_style( 'brewers-admin-css', plugin_dir_url( __FILE__ ) . 'css/admin.css', array(), '1.0' );
			//js
			wp_enqueue_script( 'brewers-admin-js', plugin_dir_url( __FILE__ ) . 'js/admin.js', array('jquery'), '1.0', true );
		}
	}

}