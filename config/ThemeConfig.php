<?php
/**
 * Class to load basic theme configuration
 *
 * @package wptheme
 */

namespace Config;

if ( !defined( 'ABSPATH' ) )
    exit;

class ThemeConfig
{
    public function __construct()
    {
        $this->create_theme_constants();
        $this->load_config();
        $this->load_source();

        add_action( 'after_setup_theme', array( $this, 'load_theme_textdomain' ) );
        add_action( 'after_setup_theme', array( $this, 'load_theme_supports' ) );
        add_action( 'login_head', array( $this, 'mylogo_login' ) );
    }

    public function create_theme_constants()
    {
        if ( !defined( 'THEME_DIR' ) )
            define( 'THEME_DIR', get_template_directory() );

        if ( !defined( 'THEME_URL' ) )
            define( 'THEME_URL', get_template_directory_uri() );

        if ( !defined( 'THEME_LANG_DIR' ) )
            define( 'THEME_LANG_DIR', get_template_directory_uri() . '/languages' );

        if ( !defined( 'THEME_INCLUDES_DIR' ) )
            define( 'THEME_INCLUDES_DIR', get_template_directory_uri() . '/inc' );
    }

    public function load_config()
    {
        $menu    = new ThemeMenus;
        $scripts = new LoadThemeScripts;
        $styles  = new LoadThemeStyles;
    }

    public function load_source()
    {
        $sample = new \Source\SampleClass\SampleClass;
    }

    public function load_theme_textdomain()
    {
        load_theme_textdomain( 'wptheme-textdomain', THEME_LANG_DIR );
    }

    public function load_theme_supports()
    {
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'title-tag' );

        add_theme_support( 'html5', array( 'search-form',  'comment-form', 'comment-list', 'gallery', 'caption' ) );
        add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat' ) );

        add_theme_support( 'custom-logo', array(
            'width' 			=> '64',
            'height' 			=> '64',
            'flex-height' 		=> true,
            'flex-width' 		=> true,
            'header-text' 		=> array( 'site-title', 'site-description' ),
        ) );
    }

    function mylogo_login()
    {
        echo '<style type="text/css">
            .login h1 a { background-image:url(' . THEME_INCLUDES_DIR . '/images/website-logo.svg) !important; }</style>';
    }
}