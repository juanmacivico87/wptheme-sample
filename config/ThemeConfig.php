<?php
/**
 * Class to load basic theme configuration
 *
 * @package wptheme-sample
 */

namespace PrefixConfig;

if ( !defined( 'ABSPATH' ) )
    exit;

use PrefixSource\SampleClass\SampleClass;

class ThemeConfig
{
    public function __construct()
    {
        $this->create_theme_constants();
        $this->load_config();
        $this->init();
    }

    public function init()
    {
        add_action( 'after_setup_theme', array( $this, 'load_theme_textdomain' ) );
        add_action( 'after_setup_theme', array( $this, 'load_theme_supports' ) );
        add_action( 'after_setup_theme', array( $this, 'load_source' ) );
    }

    public function create_theme_constants()
    {
        define( 'PREFIX_THEME_DIR', get_template_directory() );
        define( 'PREFIX_THEME_URL', get_template_directory_uri() );
        define( 'PREFIX_THEME_LANG_DIR', get_template_directory_uri() . '/languages' );
        define( 'PREFIX_THEME_ASSETS_DIR', get_template_directory_uri() . '/assets' );
    }

    public function load_config()
    {
        $menu    = new ThemeMenus();
        $scripts = new LoadThemeScripts();
        $styles  = new LoadThemeStyles();
    }

    public function load_source()
    {
        $sample = new SampleClass();
    }

    public function load_theme_textdomain()
    {
        load_theme_textdomain( 'wptheme-sample', PREFIX_THEME_LANG_DIR );
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
}
