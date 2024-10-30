<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       catchthemes.com
 * @since      1.0.0
 *
 * @package    Catch_Instagram_Feed_Gallery_Widget
 * @subpackage Catch_Instagram_Feed_Gallery_Widget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Catch_Instagram_Feed_Gallery_Widget
 * @subpackage Catch_Instagram_Feed_Gallery_Widget/admin
 * @author     Catch Themes <info@catchthemes.com>
 */
class Catch_Instagram_Feed_Gallery_Widget_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Catch_Instagram_Feed_Gallery_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Catch_Instagram_Feed_Gallery_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/catch-instagram-feed-gallery-widget-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Catch_Instagram_Feed_Gallery_Widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Catch_Instagram_Feed_Gallery_Widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/catch-instagram-feed-gallery-widget-admin.js', array( 'jquery' ), $this->version, false );
	}

	/**
	 * Catch Instagram Feed Gallery Widget: action_links
	 * Catch Instagram Feed Gallery Widget Settings Link function callback
	 *
	 * @param arrray $links Link url.
	 *
	 * @param arrray $file File name.
	 */
	public function action_links( $links, $file ) {
		if ( $file === $this->plugin_name . '/' . $this->plugin_name . '.php' ) {
			$settings_link = '<a href="' . esc_url( admin_url( 'admin.php?page=catch_instagram_feed_gallery_widget' ) ) . '">' . esc_html__( 'Settings', 'catch-instagram-feed-gallery-widget' ) . '</a>';

			array_unshift( $links, $settings_link );
		}
		return $links;
	}

	/**
	 * Catch Instagram Feed Gallery Widget: add_plugin_settings_menu
	 * add Catch Instagram Feed Gallery Widget to menu
	 */
	public function add_plugin_settings_menu() {
		$catch_instagram_feed_gallery_widget_svg = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCIgdmlld0JveD0iMCAwIDI0IDI0Ij48cGF0aCBkPSJNMTIgMi4xNjNjMy4yMDQgMCAzLjU4NC4wMTIgNC44NS4wNyAzLjI1Mi4xNDggNC43NzEgMS42OTEgNC45MTkgNC45MTkuMDU4IDEuMjY1LjA2OSAxLjY0NS4wNjkgNC44NDkgMCAzLjIwNS0uMDEyIDMuNTg0LS4wNjkgNC44NDktLjE0OSAzLjIyNS0xLjY2NCA0Ljc3MS00LjkxOSA0LjkxOS0xLjI2Ni4wNTgtMS42NDQuMDctNC44NS4wNy0zLjIwNCAwLTMuNTg0LS4wMTItNC44NDktLjA3LTMuMjYtLjE0OS00Ljc3MS0xLjY5OS00LjkxOS00LjkyLS4wNTgtMS4yNjUtLjA3LTEuNjQ0LS4wNy00Ljg0OSAwLTMuMjA0LjAxMy0zLjU4My4wNy00Ljg0OS4xNDktMy4yMjcgMS42NjQtNC43NzEgNC45MTktNC45MTkgMS4yNjYtLjA1NyAxLjY0NS0uMDY5IDQuODQ5LS4wNjl6bTAtMi4xNjNjLTMuMjU5IDAtMy42NjcuMDE0LTQuOTQ3LjA3Mi00LjM1OC4yLTYuNzggMi42MTgtNi45OCA2Ljk4LS4wNTkgMS4yODEtLjA3MyAxLjY4OS0uMDczIDQuOTQ4IDAgMy4yNTkuMDE0IDMuNjY4LjA3MiA0Ljk0OC4yIDQuMzU4IDIuNjE4IDYuNzggNi45OCA2Ljk4IDEuMjgxLjA1OCAxLjY4OS4wNzIgNC45NDguMDcyIDMuMjU5IDAgMy42NjgtLjAxNCA0Ljk0OC0uMDcyIDQuMzU0LS4yIDYuNzgyLTIuNjE4IDYuOTc5LTYuOTguMDU5LTEuMjguMDczLTEuNjg5LjA3My00Ljk0OCAwLTMuMjU5LS4wMTQtMy42NjctLjA3Mi00Ljk0Ny0uMTk2LTQuMzU0LTIuNjE3LTYuNzgtNi45NzktNi45OC0xLjI4MS0uMDU5LTEuNjktLjA3My00Ljk0OS0uMDczem0wIDUuODM4Yy0zLjQwMyAwLTYuMTYyIDIuNzU5LTYuMTYyIDYuMTYyczIuNzU5IDYuMTYzIDYuMTYyIDYuMTYzIDYuMTYyLTIuNzU5IDYuMTYyLTYuMTYzYzAtMy40MDMtMi43NTktNi4xNjItNi4xNjItNi4xNjJ6bTAgMTAuMTYyYy0yLjIwOSAwLTQtMS43OS00LTQgMC0yLjIwOSAxLjc5MS00IDQtNHM0IDEuNzkxIDQgNGMwIDIuMjEtMS43OTEgNC00IDR6bTYuNDA2LTExLjg0NWMtLjc5NiAwLTEuNDQxLjY0NS0xLjQ0MSAxLjQ0cy42NDUgMS40NCAxLjQ0MSAxLjQ0Yy43OTUgMCAxLjQzOS0uNjQ1IDEuNDM5LTEuNDRzLS42NDQtMS40NC0xLjQzOS0xLjQ0eiIvPjwvc3ZnPg==';
		add_menu_page(
			esc_html__( 'Catch Instagram Feed Gallery Widget', 'catch-instagram-feed-gallery-widget' ),
			esc_html__( 'Catch Instagram Feed Gallery Widget', 'catch-instagram-feed-gallery-widget' ),
			'manage_options',
			'catch_instagram_feed_gallery_widget',
			array( $this, 'settings_page' ),
			$catch_instagram_feed_gallery_widget_svg,
			'99.01564'
		);
	}

	/**
	 * Catch Instagram Feed Gallery Widget: catch_web_tools_settings_page
	 * Catch Instagram Feed Gallery Widget Setting function
	 */
	public function settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			wp_die( esc_html__( 'You do not have sufficient permissions to access this page.' ) );
		}

		require plugin_dir_path( __FILE__ ) . 'partials/catch-instagram-feed-gallery-widget-admin-display.php';
	}

	/**
	 * Catch Instagram Feed Gallery Widget: register_settings
	 * Catch Instagram Feed Gallery Widget Register Settings
	 */
	public function register_settings() {
		register_setting(
			'catch-instagram-feed-gallery-widget-group',
			'catch_instagram_feed_gallery_widget_options',
			array( $this, 'sanitize_callback' )
		);
	}

	/**
	 * Catch Instagram Feed Gallery Widget: sanitize_callback
	 * Catch Instagram Feed Gallery Widget Sanitization function callback
	 *
	 * @param arrray $input Input data for sanitization.
	 */
	public function sanitize_callback( $input ) {
		$message = null;
		$type = null;
		// Verify the nonce before proceeding.
	    if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
	    	|| ( ! isset( $_POST['catch_instagram_feed_gallery_widget_nonce'] )
	    	|| ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['catch_instagram_feed_gallery_widget_nonce'] ) ), basename( __FILE__ ) ) )
	    	|| ( ! check_admin_referer( basename( __FILE__ ), 'catch_instagram_feed_gallery_widget_nonce' ) ) ) {
	    	if ( null !== $input ) {
	    		if ( isset( $input['username'] ) && $input['username'] ) {
					$input['username']        = wp_kses_post( $input['username'] );
				}

				if ( isset( $input['user_id'] ) && $input['user_id'] ) {
					$input['user_id']        = wp_kses_post( $input['user_id'] );
				}

				if ( isset( $input['access_token'] ) ) {
					$input['access_token']        = wp_kses_post( $input['access_token'] );
				}

				$message = esc_html__( 'Options saved successfully.', 'catch-instagram-feed-gallery-widget' );
					$type = 'updated';
			} else {

				$message = esc_html__( 'Error! There was a problem.', 'catch-instagram-feed-gallery-widget' );
				$type = 'error';

			}

			// Add_settings_error( $setting, $code, $message, $type ).
			add_settings_error( 'catch_instagram_feed_gallery_widget_notice', 'catch_instagram_feed_gallery_widget_notice', $message, $type );

			return $input;
	    } // End if().
	    return 'Invalid Nonce';

	}

	function activation_redirect() {
	    if ( get_option( 'catch_instagram_feed_gallery_widget_activation_redirect', false ) ) {
	        delete_option( 'catch_instagram_feed_gallery_widget_activation_redirect' );
	        if ( ! isset( $_GET['activate-multi'] ) ) {
	            wp_redirect( menu_page_url( 'catch_instagram_feed_gallery_widget', false ) );
	        }
	    }
	}

	function add_settings_errors() {
	    settings_errors();
	}

	function catch_instagram_feed_gallery_widget_admin_ajax_welcome_panel() {
		if ( check_ajax_referer( 'catch-instagram-feed-gallery-widget-welcome-nonce', 'welcomenonce', false ) ) {
			if ( empty( $_POST['visible'] ) ) {
				update_option( 'catch_instagram_feed_gallery_widget_dismiss', true );
			}
		}
		wp_die();
	}

}
