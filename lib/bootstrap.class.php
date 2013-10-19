<?php
/**
 * Bootstrap class
 *
 */

class Bootstrap {

    private $_router;

    /**
     * Constructor
     */
    public function __construct() {
        spl_autoload_register( array( $this, 'autoload' ) );
    }

    /**
     * Start the application
     *
     */
    public function start() {
        $this->setReporting();
        $this->route();
    }

    /**
     * Set the Environment behaviors
     *
     */
    function setReporting() {
        if ( DEVELOPMENT_ENVIRONMENT == true ) {
            error_reporting( E_ALL );
            ini_set( 'display_errors', 'On' );
        }
        else {
            error_reporting( E_ALL );
            ini_set( 'display_errors', 'Off' );
            ini_set( 'log_errors', 'On' );
            ini_set( 'error_log', ROOT . DS . 'tmp' . DS . 'logs' . DS . 'error.log' );
        }
    }

    /**
     * Route the request
     *
     */
    public function route() {
        global $url;

        $this->_router = new Router( $url );
        $this->_router->route();
    }

    /**
     * Autoload
     *
     */
    public function autoload( $className ) {
        if ( file_exists( ROOT . DS . 'lib' . DS . strtolower( $className ) . '.class.php' ) ) {
            require_once( ROOT . DS . 'lib' . DS . strtolower( $className ) . '.class.php' );
        }
        else {
            if ( file_exists( ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower( $className ) . '.php' ) ) {
                require_once( ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower( $className ) . '.php' );
            }
            else {
                if ( file_exists( ROOT . DS . 'application' . DS . 'models' . DS . strtolower( $className ) . '.php' ) ) {
                    require_once( ROOT . DS . 'application' . DS . 'models' . DS . strtolower( $className ) . '.php' );
                }
                else {
                    /* TODO Error Generation Code Here */
                }
            }
        }
    }
}