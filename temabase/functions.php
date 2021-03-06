<?php

/**
 * @author Natanael Oliveira
 * @package Meu tema 
 * @subpackage Meu Tema base
 * @since 1.0.0
 */

// SETUP INITIAL
//--------------------------------------
if (!function_exists('theme_setup')) :
	function theme_setup()
	{
		// LOGO
		add_theme_support(
			'custom-logo',
			array(
				'flex-width'  => false,
				'flex-height' => false,
			)
		);

		// BACKGROUND IMAGE
		$defaults = array(
			'default-color'          => 'ffffff',
			'default-repeat'         => 'no-repeat',
			'default-position-x'     => 'center',
			'default-attachment'     => 'fixed',
		);
		add_theme_support('custom-background', $defaults);

		// REGISTER MENUS
		function menus_init()
		{
			register_nav_menu('menu-principal', __('Menu principal'));
			register_nav_menu('menu-rodape', __('Menu Rodape'));
		}
		add_action('init', 'menus_init');

		// REGISTER WIDGET
		function widgets_init()
		{

			register_sidebar(array(
				'name'          => 'Contatos Footer',
				'id'            => 'contatos_footer',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="rounded">',
				'after_title'   => '</h2>',
			));
		}
		add_action('widgets_init', 'widgets_init');

		// ADD SUPPORT FOR RESPONSIVE EMBEDDED CONTENT
		add_theme_support('responsive-embeds');
		// ADD THUMBNAIL TO POST THEME
		add_theme_support('post-thumbnails');
		add_image_size('post-thumb', 320, 190, true);
		add_image_size('blog-thumb', 370, 250, true);
	}
endif;
add_action('after_setup_theme', 'theme_setup');


// SCRIPTS AND STYLES
//--------------------------------------
function theme_scripts()
{
	// THEME
	wp_enqueue_style('_css-main', get_template_directory_uri() . '/assets/css/style.min.css', wp_get_theme()->get('Version'));
	wp_enqueue_script('js-scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', array('jquery'), '1.0', true);

	// MASK FORMS
	wp_enqueue_script('js-mask', get_template_directory_uri() . '/assets/js/jquery.mask.min.js', '1.0', true);
}
add_action('wp_enqueue_scripts', 'theme_scripts');
