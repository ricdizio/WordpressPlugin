<?php

/**
 * 
 * @package ricdizio's plugin
 * 
 */

namespace Inc;

final class Init {

    /**
     * 
     * @method Store all the classes inside an array
     * 
     * @return [array] Array of classes
     */
    public static function get_services () {

        return [ 
            Pages\Admin::class,
            Pages\TableController::class,
        ];
    }
    
    /**
     * 
     * @method function that register all the services that are stored 
     * in the array (get_services method)
     * 
     * @param void
     * 
     * @return void
     * 
     */
    public static function register_services () {

        foreach ( Self::get_services() as $class ) {

            $service = Self::instantiate ( $class );

            if( method_exists ( $service,  'register' ) ) {

                $service->register();

            }
        }
    }

    /**
     * 
     * @method function that inicialite the classes
     * 
     * @param
     * 
     * @return $service (a new instance)
     * 
     */
    private static function instantiate ( $class ) {

        $service = new $class;
        
        return $service;

    }

}