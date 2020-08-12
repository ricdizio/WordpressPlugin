<?php

/**
 * 
 * @package ricdizio's plugin
 * 
 */

namespace Inc\Pages;

class Admin {

    /**
     * @method constructor
     */
    public function __construc () {} 

    /**
     * 
     * @method function that register the page's setting of the plugin
     * 
     * @param void
     * 
     * @return void
     */
    public function register () {
        //Admin labels
        add_action('admin_menu', array ( $this, 'add_admin_pages' ) );
    }

    /**
     * 
     * @method function that inject the option in the meneadmin menu of wordpress and add the 
     * filter for the edit link on the setting's plugin screen.
     * 
     * @param void
     * 
     * @return void
     * 
     */
    public function add_admin_pages () {

        add_menu_page( 'ricdizio Plugin' , 'ricdizio', 'manage_options', 'ricdizio_plugin', array( $this, 'admin_index' ) , 'dashicons-format-aside' , null );

        //Filter for add the botton edit 
        add_filter( "plugin_action_links_" . PLUGIN_BASENAME , array( $this ,  'settings_link' ) );

    }

    /**
     * 
     * @method function that import the php page (Settings of the scripts)
     * 
     */

    public function admin_index () {

        if( PLUGIN_PATH != null) {
            
            require_once( PLUGIN_PATH . 'assets/views/Admin.php' );
        }

        else {
            echo "</ br </ br> Something went grong trying to get global plugin path </ br> </ br>";
        }

    }

    /**
     * @method function that add <a> tag for the button edit
     * 
     *@return $links
     */

    public function settings_link ( $links ) {

        //Add custom settings links
        $settings_link = '<a href = "options-general.php?page=ricdizio_plugin" >Edit</a>';

        array_push( $links, $settings_link );

        return $links;
    }



}