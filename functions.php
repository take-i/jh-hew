<?php
/**
 * JankHack-Hew functions and definitions
 *
 * @package JankHack-Hew
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 984; /* pixels */
}

if ( ! function_exists( 'jhhew_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jhhew_setup() {

	load_theme_textdomain( 'jhhew', get_template_directory() . '/languages' );

	add_editor_style( array( 'editor-style.css', jhhew_fonts_url() ) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	// Post thumbnails
	set_post_thumbnail_size( 984, 9999, false );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'	=> __( 'Primary Menu', 'jhhew' ),
		'social'	=> __( 'Social Menu', 'jhhew' ),
	) );

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'caption',
	) );

	add_theme_support( 'post-formats', array(
		'aside',
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jhhew_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_filter( 'use_default_gallery_style', '__return_false' );

}
endif; // jhhew_setup
add_action( 'after_setup_theme', 'jhhew_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jhhew_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Top Widget Area One', 'jhhew' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Widget Area Two', 'jhhew' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Widget Area Three', 'jhhew' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Top Widget Area Four', 'jhhew' ),
		'id'            => 'sidebar-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'jhhew_widgets_init' );

/**
 * Register Google fonts for JankHack-Hew
 */
/**
 * Returns the Google font stylesheet URL, if available.
 */
function jhhew_fonts_url() {
	$fonts_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Source Sans Pro, translate this to 'off'. Do not translate into your own language.
	 */
	$open_sans  = _x( 'on', 'Open Sans font: on or off',  'jhhew' );

	/* translators: If there are characters in your language that are not supported
	 * by Droid Serif, translate this to 'off'. Do not translate into your own language.
	 */
	$noto_serif = _x( 'on', 'Noto Serif font: on or off', 'jhhew' );

	if ( 'off' !== $open_sans || 'off' !== $noto_serif ) {
		$font_families = array();

		if ( 'off' !== $open_sans ) {
			$font_families[] = 'Open Sans:400,600,700,400italic,600italic,700italic';
		}
		if ( 'off' !== $noto_serif ) {
			$font_families[] = 'Noto Serif:400,700,400italic,700italic';
		}
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin' ),
		);
		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function jhhew_scripts() {
	// Add Open Sans and Noto Serif fonts.
	wp_enqueue_style( 'JankHack-Hew-fonts', jhhew_fonts_url(), array(), null );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	wp_enqueue_style( 'JankHack-Hew-style', get_stylesheet_uri() );

	wp_enqueue_script( 'JankHack-Hew-scripts', get_template_directory_uri() . '/js/JankHack-Hew.js', array( 'jquery' ), '20140909', true );

	wp_enqueue_script( 'JankHack-Hew-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'JankHack-Hew-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jhhew_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';

/**  ==================================================
 * Sample snippet 3
 *
 * When adding new media, insert the processed data into the caption.
 * Use the original action hook ('exif_details_update') with function.
 *
 * @param array $metadata  metadata.
 * @param int   $id  id.
 */
function media_caption( $metadata, $id ) {
    $mime_type = get_post_mime_type( $id );
    if ( in_array( $mime_type, array( 'image/jpeg', 'image/tiff', 'image/webp' ) ) ) {
        do_action( 'exif_details_update', $id );
        $exifdatas = get_post_meta( $id, '_exif_details', true );
        if ( ! empty( $exifdatas ) ) {
            $camera = null;
            $f_number = null;
            $s_speed = null;
            $iso = null;
            $date = null;
            $googlemap = null;
            if ( array_key_exists( 'Model', $exifdatas ) ) {
                $camera = 'Camera:' . $exifdatas['Model'];
            }
            if ( array_key_exists( 'ApertureFNumber', $exifdatas ) ) {
                $f_number = 'F-number:' . $exifdatas['ApertureFNumber'];
            }
            if ( array_key_exists( 'ExposureTime', $exifdatas ) ) {
                $s_speed = 'Shutter speed:' . $exifdatas['ExposureTime'];
            }
            if ( array_key_exists( 'ISOSpeedRatings', $exifdatas ) ) {
                $isodata = json_decode( $exifdatas['ISOSpeedRatings'] );
                if ( is_array( $isodata ) ) {
                    $iso = 'ISO:' . $isodata[0];
                } else {
                    $iso = 'ISO:' . $isodata;
                }
            }
            if ( array_key_exists( 'DateTimeOriginal', $exifdatas ) ) {
                $date = 'Date:' . $exifdatas['DateTimeOriginal'];
            }
            if ( array_key_exists( 'latitude_dd', $exifdatas ) && array_key_exists( 'longtitude_dd', $exifdatas ) ) {
                $googlemap = '<a href="https://www.google.com/maps?q=' . $exifdatas['latitude_dd'] . ',' . $exifdatas['longtitude_dd'] . '">Google Map</a>';
            }
            $caption = sprintf( '%1$s %2$s %3$s %4$s %5$s %6$s', $camera, $f_number, $s_speed, $iso, $date, $googlemap );
            $caption = rtrim( $caption );
            $caption = preg_replace( '/\s(?=\s)/', '', $caption );
            $media_post = array(
                'ID'           => $id,
                'post_excerpt' => $caption,
            );
            wp_update_post( $media_post );
        }
    }
    return $metadata;
}
add_filter( 'wp_generate_attachment_metadata', 'media_caption', 10, 2 );

/**  ==================================================
 * Sample snippet 1
 *
 * The original filter hook('exif_details_data'),
 * which changes the display when retrieving an Exif and storing it in metadata.
 * The following changes the display of the shooting date and time.
 *
 * @param array $exifdatas  exifdatas.
 * @param int   $id  id.
 */
function exif_details_change( $exifdatas, $id ) {
    if ( array_key_exists( 'DateTimeOriginal', $exifdatas ) ) {
        $shooting_date = str_replace( ':', '-', substr( $exifdatas['DateTimeOriginal'], 0, 10 ) );
        $shooting_time = substr( $exifdatas['DateTimeOriginal'], 10 );
        $exifdatas['DateTimeOriginal'] = $shooting_date . $shooting_time;
    }
    return $exifdatas;
}
add_filter( 'exif_details_data', 'exif_details_change', 10, 2 );

/* Contact form */
/* Theme Unique JS Read */
function add_scripts()
{
	/* Sendmail */
	wp_enqueue_script('sendmail',get_template_directory_uri().'/js/contact.js', array(), '20210612', true);

	/* JS Read */
	if (is_home()) {
		//wp_enqueue_script('toppage');
	} elseif (is_page('sendmail')) {
		wp_enqueue_script('sendmail');
	}
}
add_action('wp_enqueue_scripts', 'add_scripts');

function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );

add_filter( 'upload_mimes', function ( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
});

add_filter( 'manage_media_columns', function ( $columns ) {
    echo '<style>.media-icon img[src$=".svg"]{width:100%;}</style>';
    return $columns;
});

// 標準のFEEDを削除　コメント本体
//　<link rel="alternate" type="application/rss+xml" title="JunkHack &raquo; フィード" href="/feed/">
// <link rel="alternate" type="application/rss+xml" title="JunkHack &raquo; コメントフィード" href="/comments/feed/">
//
remove_action('wp_head', 'feed_links', 2);
remove_theme_support('automatic-feed-links');

// 縦書きテンプレート？
function is_tategaki(){
    // 投稿の縦書
		if (get_post_format() === "aside") {
			return true;
    }
		// 投稿フォーマットのタイプ 'aside' のアーカイブページが表示されているとき
		// if (is_tax( 'post_format', 'post-format-aside' )) {
		// 	return true;
    // }
		// ページテンプレート縦書き
		if (is_page_template('page_single.php')) {
			return true;
		}
		// ページテンプレート縦書き
		if (is_page_template('page_27ate.php')) {
			return true;
		}
		if (is_category()) {
			return true;
		}
		
}

// 縦書きフォーマット（aside）の場合に必要なヘッダ出力
function is_need_nehan() {
	if (is_tategaki()) {
		echo '
		<link charset="utf-8" rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/js/nehan2/nehan2.css" />
		<script charset="utf-8" type="text/javascript" src="' . get_template_directory_uri() . '/js/nehan2/subject.js"></script>
		<script charset="utf-8" type="text/javascript" src="' . get_template_directory_uri() . '/js/nehan2/Plugin_haiku.js"></script>
		<script charset="utf-8" type="text/javascript" src="' . get_template_directory_uri() . '/js/nehan2/nehan2.js"></script>
		<script type="text/javascript">

		let pw = window.innerWidth;
		let ph = window.innerHeight;
		let wsize = 0;
		function resizeWindow(event){
				pw = window.innerWidth;
				ph = window.innerHeight;
		}
	
		window.addEventListener("resize", resizeWindow);

			window.onload = function(){
			var createPageFrame = function(body){
				var node = document.createElement("div");
				var style = node.style;
				node.innerHTML = body;
				node.className = "page-frame";
				return node;
			};

			var outputAllPages = function(dstId, provider){
				var pageNo = 0;
				var dstNode = document.getElementById(dstId);

				// add <subject> element to parser for easy markup(see subject.js)
				Nehan.Plugin.defineSubjectElement(provider);
				Nehan.Plugin_haiku.defineHaikuElement(provider);

				while(provider.hasNextPage()){
					var pageData = provider.outputPage(pageNo++);
					var pageFrame = createPageFrame(pageData.html);
					dstNode.appendChild(pageFrame);
				}
			};
			
			var text = document.getElementById("src-text").innerHTML;
		';
	}

	if(is_page_template('page_single.php') && is_tategaki()){
		echo '
		// output vertical pages.13moji
		outputAllPages("result-vertical", new Nehan.PageProvider({
			direction:"vertical",
			width:${wsize},
			height:220,
			fontSize:16
		}, text));
		';
	}
	else if(is_page_template('page_27ate.php') && is_tategaki()){
		echo '
		// output vertical pages.27moji
		outputAllPages("result-vertical", new Nehan.PageProvider({
			direction:"vertical",
			width:925,
			height:440,
			fontSize:16
		}, text));
		';
	}
		else if(is_tategaki()){
		echo '// output default page1.';
		echo '
		if(pw < 480){
			// output vertical post.27moji
			outputAllPages("result-vertical", new Nehan.PageProvider({
				direction:"vertical",
				width:310,
				height:440,
				fontSize:16
			}, text));
		}
		if(pw > 479 && pw < 600){
			// output vertical post.27moji
			outputAllPages("result-vertical", new Nehan.PageProvider({
				direction:"vertical",
				width:420,
				height:440,
				fontSize:16
			}, text));
		}
		if(pw > 599 && pw < 744){
			// output vertical post.27moji
			outputAllPages("result-vertical", new Nehan.PageProvider({
				direction:"vertical",
				width:540,
				height:440,
				fontSize:16
			}, text));
		}
		if(pw > 743 && pw < 889){
			// output vertical post.27moji
			outputAllPages("result-vertical", new Nehan.PageProvider({
				direction:"vertical",
				width:680,
				height:440,
				fontSize:16
			}, text));
		}
		if(pw > 888){
			// output vertical post.27moji
			outputAllPages("result-vertical", new Nehan.PageProvider({
				direction:"vertical",
				width:890,
				height:440,
				fontSize:16
			}, text));
		}
		';
	}

	if (is_tategaki()) {
		echo '
		document.getElementById("progress").style.display = "none";
		};
		</script>
		';
	}

}