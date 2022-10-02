<?php 

namespace Plugin\Boilarplate\Admin;

/**
 * Register dashboard menu class
 */

class Menu {
    
    /**
     * Menu constructor
     *
     * @return void
     */
    public function __construct()
    {
        add_action( 'admin_menu', [ $this, 'admin_menu' ]);
    }
    
    /**
     * admin_menu
     *
     * @return void
     */
    public function admin_menu()
    {
        add_menu_page( __( 'Plugin Boilarplate', 'plugin-boilarplate' ), __( 'Plugin Boilarplate', 'plugin-boilarplate' ), 'manage_options', 'plugin-boilarplate', [ $this, 'plugin_page' ], 'dashicons-welcome-learn-more' );
    }
    
    /**
     * plugin_page
     *
     * @return void
     */

    public function plugin_page()
    {
        echo "Hello World";
    }
}