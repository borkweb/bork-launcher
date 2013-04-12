<?php

require 'includes/class-bork-menu-widget.php';
require 'includes/class-bork-menu-walker.php';

add_action( 'admin_enqueue_scripts', function() {
	wp_register_style(
		'admin-style',
		get_stylesheet_directory_uri() . '/admin.css',
		array(),
		'1'
	);

	wp_enqueue_style( 'admin-style' );
});

add_action( 'widgets_init', function() {
	for ( $i = 1; $i <= 10; $i++ ) {
		$args = array(
			'name' => 'Column ' . $i . ( $i % 2 == 0 ? ' (wide)' : '' ),
			'id' => 'sidebar-' . $i,
			'before_widget' => '<div class="widget">',
			'after_widget' => '</div>',
		);

		register_sidebar( $args );
	}//end for

	register_widget( 'Bork_Menu_Widget' );
});

add_action( 'wp_enqueue_scripts', function() {
	wp_register_script(
		'jquery-hashchange',
		get_stylesheet_directory_uri() . '/js/external/jquery.ba-hashchange.min.js',
		array( 'jquery' ),
		'1',
		TRUE
	);

	wp_register_script(
		'bootstrap',
		get_stylesheet_directory_uri() . '/bootstrap/js/bootstrap.min.js',
		array( 'jquery' ),
		'1',
		TRUE
	);

	wp_register_script(
		'behavior',
		get_stylesheet_directory_uri() . '/js/behavior.js',
		array( 'jquery', 'jquery-hashchange' ),
		'1',
		TRUE
	);

	wp_register_style(
		'bootstrap',
		get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css',
		array(),
		'1'
	);

	wp_register_style(
		'bootstrap-responsive',
		get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap-responsive.min.css',
		array( 'bootstrap' ),
		'1'
	);

	wp_register_style(
		'core',
		get_stylesheet_directory_uri() . '/core.css',
		array( 'bootstrap' ),
		'1'
	);

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'jquery-hashchange' );
	wp_enqueue_script( 'bootstrap' );
	wp_enqueue_script( 'behavior' );

	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'bootstrap-responsive' );
	wp_enqueue_style( 'core' );

});
