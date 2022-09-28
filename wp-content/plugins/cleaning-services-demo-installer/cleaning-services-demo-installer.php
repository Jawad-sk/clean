<?php
/**
 * Plugin Name: Cleaning Services Demo Installer
 * 
 * Description: It's a customized version of cleaning_services Demo Importer
 * Version: 1.3
 * Author: SmartDataSoft
 * Author URI: http://www.smartdatasoft.com/
 * Requires at least: 4.0
 * Tested up to: 4.4.2
 *
 * Text Domain: cleaning_services
 */
 

if(!defined('ABSPATH')){
    die('Access denied.');
}

if(!function_exists('redux_register_custom_extension_loader')) :


	
	function redux_register_custom_extension_loader($ReduxFramework) {

	

		$path    = dirname( __FILE__ ) . '/extensions/';

		$folders = scandir( $path, 1 );
		foreach ( $folders as $folder ) {
			if ( $folder === '.' or $folder === '..' or ! is_dir( $path . $folder ) ) {
				continue;
			}
			$extension_class = 'ReduxFramework_Extension_' . $folder;
			if ( ! class_exists( $extension_class ) ) {
				// In case you wanted override your override, hah.
				$class_file = $path . $folder . '/extension_' . $folder . '.php';
				$class_file = apply_filters( 'redux/extension/' . $ReduxFramework->args['opt_name'] . '/' . $folder, $class_file );
				if ( $class_file ) {
					require_once( $class_file );
				}
			}
			if ( ! isset( $ReduxFramework->extensions[ $folder ] ) ) {
				$ReduxFramework->extensions[ $folder ] = new $extension_class( $ReduxFramework );
			}
		}
	}
	// Modify {$redux_opt_name} to match your opt_name
	add_action("redux/extensions/cleaning_services_opt/before", 'redux_register_custom_extension_loader', 0);
endif;

if ( !function_exists( 'wbc_importer_description_text' ) ) {

	/**
	 * Filter for changing importer description info in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title description above demos
	 *
	 * @return [string] return.
	 */

	function wbc_importer_description_text( $description ) {

		$message = '<p>'. esc_html__( 'Best if used on new WordPress install.', 'framework' ) .'</p>';
		$message .= '<p>'. esc_html__( 'Images are for demo purpose only.', 'framework' ) .'</p>';

		return $message;
	}

	// Uncomment the below
	 add_filter( 'wbc_importer_description', 'wbc_importer_description_text', 10 );
}
if ( !function_exists( 'wbc_importer_label_text' ) ) {

	/**
	 * Filter for changing importer label/tab for redux section in options panel
	 * when not setting in Redux config file.
	 *
	 * @param [string] $title label above demos
	 *
	 * @return [string] return no html
	 */

	function wbc_importer_label_text( $label_text ) {

		$label_text = 'Demo Importer';

		return $label_text;
	}

	// Uncomment the below
 add_filter( 'wbc_importer_label', 'wbc_importer_label_text', 10 );
}

if ( !function_exists( 'wbc_extended_example' ) ) {
	function wbc_extended_example( $demo_active_import , $demo_directory_path ) {

		reset( $demo_active_import );
		$current_key = key( $demo_active_import );

		/************************************************************************
		* Import slider(s) for the current demo being imported
		*************************************************************************/

		if ( class_exists( 'RevSlider' ) ) {

			//If it's demo3 or demo5
			$wbc_sliders_array = array(
				//'demo1' => 'test.zip', //Set slider zip name
				//'demo5' => 'anotherslider.zip', //Set slider zip name
			);

			if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_sliders_array ) ) {
				$wbc_slider_import = $wbc_sliders_array[$demo_active_import[$current_key]['directory']];

				if ( file_exists( $demo_directory_path.$wbc_slider_import ) ) {
					$slider = new RevSlider();
					$slider->importSliderFromPost( true, true, $demo_directory_path.$wbc_slider_import );
				}
			}
		}

		/************************************************************************
		* Setting Menus
		*************************************************************************/

		// If it's demo1 - demo6
		$wbc_menu_array = array( 'demo1' );

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && in_array( $demo_active_import[$current_key]['directory'], $wbc_menu_array ) ) {
			$top_menu = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
			$footer_menu = get_term_by('name', 'Footer Menu', 'nav_menu');
			if ( isset( $top_menu->term_id ) ) {
				set_theme_mod( 'nav_menu_locations', array(
						'primary' => $top_menu->term_id,
						'footer-menu'  => $footer_menu->term_id
 
					)
				);
			}

			 // Set Pages > Reading
			   $home_page = get_page_by_title( "Home Page" );
			   update_option( 'page_on_front', $home_page->ID );
			   update_option( 'show_on_front', 'page' );

			   $blog_page = get_page_by_title( "Blog" );
			   update_option( 'page_for_posts', $blog_page->ID );

		}

		/************************************************************************
		* Set HomePage
		*************************************************************************/

		// array of demos/homepages to check/select from
		$wbc_home_pages = array(
			'demo1' => 'Home Page',
			//'demo2' => 'Home Page v2',
			//'demo3' => 'Home Page v3',
			
		);

		if ( isset( $demo_active_import[$current_key]['directory'] ) && !empty( $demo_active_import[$current_key]['directory'] ) && array_key_exists( $demo_active_import[$current_key]['directory'], $wbc_home_pages ) ) {
			$page = get_page_by_title( $wbc_home_pages[$demo_active_import[$current_key]['directory']] );
			if ( isset( $page->ID ) ) {
				update_option( 'page_on_front', $page->ID );
				update_option( 'show_on_front', 'page' );
			}
		}

	}


	// Uncomment the below
	 add_action( 'wbc_importer_after_content_import', 'wbc_extended_example', 10, 2 );
}
