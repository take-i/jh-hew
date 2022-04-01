<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @package JankHack-Hew
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses jhhew_header_style()
 * @uses jhhew_admin_header_style()
 * @uses jhhew_admin_header_image()
 */
function jhhew_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'jhhew_custom_header_args', array(
		'default-image'          => jhhew_get_default_header_image(),
		'default-text-color'     => '32312f',
		'width'                  => 80,
		'height'                 => 80,
		'flex-height'            => true,
		'wp-head-callback'       => 'jhhew_header_style',
		'admin-head-callback'    => 'jhhew_admin_header_style',
		'admin-preview-callback' => 'jhhew_admin_header_image',
	) ) );
}
add_action( 'after_setup_theme', 'jhhew_custom_header_setup' );

/**
 * A default header image
 *
 * Use the admin email's gravatar as the default header image.
 */
function jhhew_get_default_header_image() {

	// Get default from Discussion Settings.
	$default = get_option( 'avatar_default', 'mystery' ); // Mystery man default
	if ( 'mystery' == $default )
		$default = 'mm';
	elseif ( 'gravatar_default' == $default )
		$default = '';

	$protocol = ( is_ssl() ) ? 'https://secure.' : 'http://';

	if ( ( get_option( 'admin_email' ) != get_theme_mod( 'gravatar_email' ) ) && is_email( get_theme_mod( 'gravatar_email' ) ) )
		$email = get_theme_mod( 'gravatar_email' );
	else
		$email = get_option( 'admin_email' );

	$url = sprintf( '%1$sgravatar.com/avatar/%2$s/', $protocol, md5( $email ) );
	$url = add_query_arg( array(
		's' => 80,
		'd' => urlencode( $default ),
	), $url );

	return esc_url_raw( $url );
} // jhhew_get_default_header_image

if ( ! function_exists( 'jhhew_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see jhhew_custom_header_setup().
 */
function jhhew_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		.site-title,
		.site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif; // jhhew_header_style

if ( ! function_exists( 'jhhew_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * @see jhhew_custom_header_setup().
 */
function jhhew_admin_header_style() {
?>
	<style type="text/css">
		.appearance_page_custom-header #headimg {
			border: none;
		}
		#headimg {
			background: #fbdb4a;
		}
		#headimg img {
			float: left;
		}
		#headimg h1 {
			float: left;
			padding: 0 1em;
		}
		#headimg h1 a {
			font-family: 'Open Sans', sans-serif;
			font-size: 36px;
			font-weight: 700;
			line-height: 1;
			text-decoration: none;
			text-transform: uppercase;
		}
	</style>
<?php
}
endif; // jhhew_admin_header_style

if ( ! function_exists( 'jhhew_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * @see jhhew_custom_header_setup().
 */
function jhhew_admin_header_image() {
	$style = sprintf( ' style="color:#%s;"', get_header_textcolor() );
?>
	<div id="headimg">
		<?php if ( get_header_image() ) : ?>
		<img src="<?php header_image(); ?>" alt="">
		<?php endif; ?>
		<h1 class="displaying-header-text"><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
	</div>
<?php
}
endif; // jhhew_admin_header_image
