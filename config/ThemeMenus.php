<?php
/**
 * Class to load theme menus
 *
 * @package wptheme-sample
 */

/* IMPORTANT. README: Menu Item CSS Classes: https://developer.wordpress.org/reference/functions/wp_nav_menu/#menu-item-css-classes */

namespace PrefixConfig;

if ( !defined( 'ABSPATH' ) )
    exit;

class ThemeMenus
{
    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        add_action( 'after_setup_theme', array( $this, 'load_theme_menus' ) );
    }

    function load_theme_menus()
    {
        register_nav_menus(
			array(
				'header-menu' => __( 'Header Menu', 'wptheme-sample' ),
				'footer-menu' => __( 'Footer Menu', 'wptheme-sample')
			)
		);
    }
}
