<?php

/**
 * 
 * @package ricdizio's plugin
 * 
 * 
 */

namespace Inc\Pages;

 class TableController {

    /**
     * 
     * @method constructor
     * 
     * @param void
     * 
     * @return void
     * 
     */

    public function __construct () {
        //Empty
    }

    /**
     * @method function that inicialite the shortcut during register.
     * 
     * @return void
     */
    public function register () {

        //Define the shortcode
        add_shortcode( 'table-plugin' , array ($this, 'importView') );
    }

    /**
     * @method function that import the view and scripts where is the table
     * 
     * @param void
     * 
     * @return void
     */
    public function importView () {

        ob_start();

        //Scripts used in the table
        wp_enqueue_style(  'ricdizio_css_table'      , PLUGIN_URL . "/assets/css/Style_Table.css"  );
        wp_enqueue_script( 'ricdizio_js_table'       , PLUGIN_URL . "/assets/js/Table.js"     );
        wp_enqueue_script( 'ricdizio_js_table_modal' , PLUGIN_URL . "/assets/js/Modal.js"     );

        //Verify if PLUGIN_PATH is NOT null
        if( PLUGIN_PATH != null) {
            require_once( PLUGIN_PATH . 'assets/views/table.php' );
        }
        else {
            echo "</ br </ br> Something went grong trying to get global plugin path </ br> </ br>";
        }
    }


 }