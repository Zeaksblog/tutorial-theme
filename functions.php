<?php

// Register extra sidebar
function mytheme_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Extra Sidebar', 'tto' ),
		'id' => 'sidebar-4',
		'description' => __( 'The Left Sidebar. Displayed on all but full width and homepage template.', 'mytheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Register footer widgets
	register_sidebar( array(
		'name' => __( 'Footer Widget One', 'mytheme' ),
		'id' => 'sidebar-5',
		'description' => __( 'Found at the bottom of every page (except 404s and optional homepage template) Left Footer Widget.', 'mytheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Two', 'mytheme' ),
		'id' => 'sidebar-6',
		'description' => __( 'Found at the bottom of every page (except 404s and optional homepage template) Center Footer Widget.', 'mytheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Footer Widget Three', 'mytheme' ),
		'id' => 'sidebar-7',
		'description' => __( 'Found at the bottom of every page (except 404s and optional homepage template) Right Footer Widget.', 'mytheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

}
add_action( 'widgets_init', 'mytheme_widgets_init' );


// Add child theme body class
function mytheme_body_class( $classes ) {
		  
	 if( ! is_page_template() )
          $classes[] = 'custom-layout';
		  
	return $classes;
}
add_filter( 'body_class', 'mytheme_body_class' );


// Change default thumbnail size
function mytheme_twentytwelve_setup() {
	set_post_thumbnail_size( 500, 9999 ); // (default featured images)Unlimited height, soft crop

}
add_action( 'after_setup_theme', 'mytheme_twentytwelve_setup', 11 );


// Override content width (for photo and video embeds)
$content_width = 500;

// Display 1000px width content if full width page template
function mytheme_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() ) {
		global $content_width;
		$content_width = 1000;
	}
}
add_action( 'template_redirect', 'mytheme_content_width', 11 );
