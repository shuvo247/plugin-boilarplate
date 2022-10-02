<?php

/**
 * Plugin Name: Plugin Boilarplate
 * Description: A simple plugin with simple crud and ajax crud
 * Plugin URi: https://github.com/shuvo247
 * Author: MD Shakibul Islam
 * Author URI: https://github.com/shuvo247
 * Version: 1.0.0
 * License: GPL2 or Later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

 if( !defined( 'ABSPATH' ) ) {
    exit();
 }

 require_once 'vendor/autoload.php';

/**
 * The Main Plugin Class
 */

final class Plugin_Boilarplate {

    /**
     * Plugin version
     * 
     * @var string
     */
    const version = '1.0.0';
    
    /**
     * The class constructor
     *
     * @return void
     */
    private function __construct()
    {

        $this->define_constant();
        
        register_activation_hook( __FILE__, [ $this, 'activate' ]);

        add_action( 'plugin_loaded', [ $this, 'init_plugin' ]);
    }

    /**
     * Initializes a singleton instance
     *
     * @return \PLugin_Boilarplate
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the all required constant
     *
     * @return void
     */

    public function define_constant()
    {
        define( 'PLUGIN_BOILARPLATE_VERSION', self::version );
        define( 'PLUGIN_BOILARPLATE_FILE', __FILE__ );
        define( 'PLUGIN_BOILARPLATE_PATH', __DIR__ );
        define( 'PLUGIN_BOILARPLATE_URL', plugins_url( '' , PLUGIN_BOILARPLATE_FILE ) );
        define( 'PLUGIN_BOILARPLATE_ASSETS', PLUGIN_NAME_ROOT_URL . '/assets' );

    }
        
    /**
     * Do something after activate plugin
     *
     * @return void
     */
    public function activate()
    {
        $installed = get_option( 'plugin_boilarplate_installed' );

        if ( ! $installed ) {
            update_option( 'plugin_boilarplate_installed', time() );
        }

        update_option( 'plugin_boilarplate_version', PLUGIN_BOILARPLATE_VERSION );
    }

    public function init_plugin()
    {
        if ( is_admin() ) {
            new \Plugin\Boilarplate\Admin();
        } else {
            new \Plugin\Boilarplate\Frontend();
        }
    }
}

/**
 * Initializes the main plugin
 *
 * @return \Plugin_Boilarplate
 */
function plugin_boilarplate() {
    return Plugin_Boilarplate::init();
}

// kick-off the plugin
plugin_boilarplate();