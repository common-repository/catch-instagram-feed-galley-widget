<?php
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       catchthemes.com
 * @since      1.0.0
 *
 * @package    Catch_Instagram_Feed_Gallery_Widget
 * @subpackage Catch_Instagram_Feed_Gallery_Widget/admin/partials
 */

?>

<?php
	$username = '';
	$catch_instagram_feed_gallery_widget_page = admin_url( 'admin.php?page=catch_instagram_feed_gallery_widget' );
	$catch_instagram_feed_gallery_widget_page_redirect = $catch_instagram_feed_gallery_widget_page . '&response_type=token';
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<?php // Use nonce for verification.
	wp_nonce_field( basename( __FILE__ ), 'catch_instagram_feed_gallery_widget_nonce' );
?>
<div class="wrap">
	<h1 class="wp-heading-inline"><?php echo esc_html( __( 'Catch Instagram Feed Gallery & Widget', 'catch-instagram-feed-gallery-widget' ) ); ?></h1>
	<span class="button button-large upgrade-to-pro" style="float: right;"><a href="https://catchthemes.com/plugins/catch-instagram-feed-gallery-widget-pro" target="_blank"><i class="dashicons dashicons-upload"></i><?php esc_html_e( 'Upgrade to Pro', 'catch-instagram-feed-gallery-widget' ); ?></a></span>
	<hr />

	<div class="catch_instagram_feed_gallery_widget_settings">

	<form id="catch-instagram-feed-gallery-widget-main" method="post" action="options.php">

			<div class="content-wrapper">

			<?php if ( ! get_option( 'catch_instagram_feed_gallery_widget_dismiss' ) ) : ?>

				<div id="welcome-panel" class="welcome-panel">
					<input type="hidden" name="catch-instagram-feed-gallery-widget-welcome-nonce" id="catch-instagram-feed-gallery-widget-welcome-nonce" value="<?php echo esc_attr( wp_create_nonce( 'catch-instagram-feed-gallery-widget-welcome-nonce' ) ); ?>" />
					<a class="welcome-panel-close" href="<?php echo esc_url( menu_page_url( 'catch_instagram_feed_gallery_widget', false ) ); ?>"><?php echo esc_html( __( 'Dismiss', 'catch-instagram-feed-gallery-widget' ) ); ?></a>

					<div class="welcome-panel-content">
						<div class="welcome-panel-column-container">
							<div class="welcome-panel-column">
								<h3><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/catch-instagram-feed-gallery-widget.svg' ); ?>" /><?php esc_html_e( 'Welcome to Catch Instagram Feed Gallery & Widget Settings', 'catch-instagram-feed-gallery-widget' ); ?></h3>

								<p><?php esc_html_e( 'Instagram Feed Gallery & Widget Plugin adds the posts from your Instagram account that you want to showcase on your website. You can display the Instagram photos from any Instagram account.', 'catch-instagram-feed-gallery-widget' ); ?></p>

								<p><?php esc_html_e( 'You can add Instagram Feed as Gallery or Widget on your website. Simply either drag-and-drop the plugin in the widget area or you can add a shortcode from your WordPress dashboard if you want to place a copy of your Instagram feed directly onto your post/page.', 'catch-instagram-feed-gallery-widget' ); ?></p>
							</div>
						</div>
					</div>
				</div>

			<?php endif; // End if(). ?>

			<div id="public-usage" class="catch-instagram-feed-gallery-widget-box">
				<div class="header">
					<h3><?php esc_html_e( 'Add Instagram Feed as Gallery or Widget', 'catch-instagram-feed-gallery-widget' ); ?></h3>
					<hr />
				</div><!-- .header -->
				<div class="content">
					<div class="as-widget">
						<p><strong><?php esc_html_e( '1. Add using Widget via our Instagram Widget', 'catch-instagram-feed-gallery-widget' ); ?></strong></p>
						<p><a class="button" href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Go to Widgets', 'catch-instagram-feed-gallery-widget' ); ?></a></p>
					</div>
					<div class="as-shortcode">
						<p><strong><?php esc_html_e( '2. Add using Shortcode in Page/Post ', 'catch-instagram-feed-gallery-widget' ); ?></strong></p>
						<div class="shortcode-option-container">
							<div>
								<p><?php echo esc_html_e( 'Add in New:', 'catch-instagram-feed-gallery-widget' ); ?></p>
								<a class="button" href="<?php echo esc_url( admin_url( 'post-new.php' ) ); ?>"><?php esc_html_e( 'Post', 'catch-instagram-feed-gallery-widget' ); ?></a> / <a class="button" href="<?php echo esc_url( admin_url( 'post-new.php?post_type=page' ) ); ?>"><?php esc_html_e( 'Page', 'catch-instagram-feed-gallery-widget' ); ?></a>
							</div>
							<div>
								<p><?php esc_html_e( 'Add in Existing:', 'catch-instagram-feed-gallery-widget' ); ?></p><a class="button" href="<?php echo esc_url( admin_url( 'edit.php' ) ); ?>"><?php esc_html_e( 'Post', 'catch-instagram-feed-gallery-widget' ); ?></a> / <a class="button" href="<?php echo esc_url( admin_url( 'edit.php?post_type=page' ) ); ?>"><?php esc_html_e( 'Page', 'catch-instagram-feed-gallery-widget' ); ?></a>
							</div>
						</div><!-- .shortcode-option-container -->
					</div>
				</div><!-- .content -->
			</div><!-- #public-usage.catch-instagram-feed-gallery-widget-box -->

			<hr />

			<?php settings_fields( 'catch-instagram-feed-gallery-widget-group' );
				$catch_instagram_feed_gallery_widget_options = catch_instagram_feed_gallery_widget_get_options( 'catch_instagram_feed_gallery_widget_options' );
				if ( isset( $_GET['access_token'] ) ) {
				    $access_token = sanitize_text_field( wp_unslash( $_GET['access_token'] ) );
				} elseif ( isset( $catch_instagram_feed_gallery_widget_options['access_token'] ) && ( '' !== $catch_instagram_feed_gallery_widget_options['access_token'] ) ) {
				    $access_token = $catch_instagram_feed_gallery_widget_options['access_token'];
				} else {
				    $access_token = '';
				}
				?>

				<?php
				if ( isset( $access_token ) && '' !== $access_token ) {
					$url      = 'https://api.instagram.com/v1/users/self/?access_token=' . esc_html( $access_token );
					$get      = wp_remote_get( $url );
					$response = wp_remote_retrieve_body( $get );
					$json     = json_decode( $response, true );

					$username = $json['data']['username'];
					$user_id  = $json['data']['id'];
				}

				if ( isset( $catch_instagram_feed_gallery_widget_options['username'] ) && ! empty( $catch_instagram_feed_gallery_widget_options['username'] ) ) {
					$username = $catch_instagram_feed_gallery_widget_options['username'];
				}

				if ( isset( $_GET['q'] ) && 'form-reset' === $_GET['q'] ) {
					$access_token = '';
					$username     = '';
					$user_id      = '';
				}
			?>

			<div id="access-token" class="catch-instagram-feed-gallery-widget-box">
				    <div class="header">
				    	<h2><?php echo esc_html( __( 'Get Access Token', 'catch-instagram-feed-gallery-widget' ) ); ?></h2>
				    	<hr />
				    </div><!-- .header -->
				    <div class="content">
				    	<p><?php esc_html_e( 'In order to use Catch Instagra Feed Gallery & Widget plugin, you will need to provide the Access Token. This section allows you to set API parameters.', 'catch-instagram-feed-gallery-widget' ); ?></p>
				    	<p class="info wp-ui-highlight"><span class="dashicons dashicons-info"></span> <?php esc_html_e( 'Please click on Save Changes button after clicking access token/resetting access token button to save the settings.', 'catch-instagram-feed-gallery-widget' ); ?></p>
				    	<?php if ( '' !== $username && '' !== $access_token ) : ?>
					    	You are logged in as <strong><?php echo esc_html( $username ); ?></strong><br />
					    	and your access token is <strong class="dont-break-out"><div><?php echo esc_html( $access_token ); ?></div></strong>
				    	<?php endif; ?>
				    	<?php if ( '' === $username || '' === $access_token ) : ?>
				    		<a class="button button-large get-token" href="https://api.instagram.com/oauth/authorize/?client_id=54da896cf80343ecb0e356ac5479d9ec&scope=basic+public_content&redirect_uri=http://api.web-dorado.com/instagram/?return_url=<?php echo esc_attr( $catch_instagram_feed_gallery_widget_page_redirect );?>">Get Access Token</a>
				    	<?php else : ?>
				    		<br />
				    		<br />

				    		<a class="button button-large reset-token" id="catch-instagram-feed-gallery-widget-reset" href="<?php echo esc_attr( $catch_instagram_feed_gallery_widget_page ) . '&q=form-reset'; ?>">Reset Access Token</a>
				    	<?php endif; ?>
				    	<?php
							    submit_button( esc_html__( 'Save Changes', 'catch-instagram-feed-gallery-widget' ), 'button-primary button-large button' );
							?>
					</div><!-- .content -->
			    </div><!-- #access-token.catch-instagram-feed-gallery-widget-box -->
			    <hr />

				<div class="form-content" style="display: none;">
					<div class="wrapper">
					    <table class="form-table">
					        <tbody>
					            <tr>
					                <th scope="row"><?php esc_html_e( 'Access Token', 'catch-instagram-feed-gallery-widget' ); ?></th>
					                <td>
					                    <input readonly="readonly" size="65" type="text" id="catch_instagram_feed_gallery_widget_options_access_token" name="catch_instagram_feed_gallery_widget_options[access_token]" value="<?php echo esc_attr( $access_token ); ?>" />
					                    <div id="login_with_instagram">
									        <a href="https://api.instagram.com/oauth/authorize/?client_id=54da896cf80343ecb0e356ac5479d9ec&scope=basic+public_content&redirect_uri=http://api.web-dorado.com/instagram/?return_url=<?php echo esc_attr( $catch_instagram_feed_gallery_widget_page_redirect );?>">Get Access Token</a>
										</div>
					                </td>
					            </tr>
					            <tr>
					                <th scope="row"><?php esc_html_e( 'Instagram Username', 'catch-instagram-feed-gallery-widget' ); ?></th>
					                <td>

					                    <input readonly="readonly" size="65" type="text" id="catch_instagram_feed_gallery_widget_options_username" name="catch_instagram_feed_gallery_widget_options[username]" value="<?php echo esc_html( $username ); ?>" />
					                     <input readonly="readonly" size="65" type="hidden" id="catch_instagram_feed_gallery_widget_options_user_id" name="catch_instagram_feed_gallery_widget_options[user_id]" value="<?php echo esc_html( $user_id ); ?>" />
					                </td>
					            </tr>
					         </tbody>
					    </table>
					</div><!-- .wrapper -->
				</div><!-- .form-content -->

		</form><!-- #catch-instagram-feed-gallery-widget-main -->
					<div id="pro-features">
				<div class="content">
					<div class="features">
					<h3><?php esc_html_e( 'Additional Features', 'catch-instagram-feed-gallery-widget' ); ?> <span><?php esc_html_e( '[Pro version]', 'catch-instagram-feed-gallery-widget' ); ?></span></h3>
						<ul>
							<li><?php esc_html_e( 'Show Feed by HashTag', 'catch-instagram-feed-gallery-widget' ); ?></li>
							<li><?php esc_html_e( 'Lightbox', 'catch-instagram-feed-gallery-widget' ); ?></li>
							<li><?php esc_html_e( 'Show Likes and Comments count', 'catch-instagram-feed-gallery-widget' ); ?></li>
							<li><?php esc_html_e( 'Various Layouts:', 'catch-instagram-feed-gallery-widget' ); ?>
								<ul>
									<li><?php esc_html_e( 'Masonry', 'catch-instagram-feed-gallery-widget' ); ?></li>
									<li><?php esc_html_e( 'Round', 'catch-instagram-feed-gallery-widget' ); ?></li>
									<li><?php esc_html_e( 'Grid', 'catch-instagram-feed-gallery-widget' ); ?></li>
								</ul>
							</li>
							<li><?php esc_html_e( 'Column Options: Up to 8 columns', 'catch-instagram-feed-gallery-widget' ); ?></li>
							<li><?php esc_html_e( 'Extra padding on images', 'catch-instagram-feed-gallery-widget' ); ?></li>
							<li><?php esc_html_e( 'Toggle link to instagram post', 'catch-instagram-feed-gallery-widget' ); ?></li>
							<li><?php esc_html_e( 'Load More button', 'catch-instagram-feed-gallery-widget' ); ?></li>
							<li><?php esc_html_e( 'Customizable load more text', 'catch-instagram-feed-gallery-widget' ); ?></li>
							<li><?php esc_html_e( 'Catch Instagram Feed Gallery Widget Shortcode Generator button in Post/Page', 'catch-instagram-feed-gallery-widget' ); ?></li>
						</ul>
					</div>
					<div class="screenshot">
						<h3><?php esc_html_e( 'Pro Screenshot', 'instagram-feed-gallery-widget' ); ?></span></h3>
						<ul>
							<li><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/screenshot-1.jpg' ); ?>"></li>
							<li><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/screenshot-2.jpg' ); ?>"></li>
							<li><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/screenshot-3.jpg' ); ?>"></li>
							<li><img src="<?php echo esc_url( plugin_dir_url( __FILE__ ) . '../images/screenshot-4.jpg' ); ?>"></li>
						</ul>
					</div>
				</div>
			</div>

			<hr />

		</div><!-- .content-wrapper -->

	</div><!-- .catch_instagram_feed_gallery_widget_settings -->
</div><!-- .wrap -->
