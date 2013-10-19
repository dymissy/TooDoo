<?php

/**
 * Route class
 *
 */

class Router {

    private $_url;
    private $_urlParts;

    private $_controller;
    private $_model;
    private $_action;
    private $_queryString;

    /**
     * Constructor
     *
     */
    public function __construct( $url ) {
        $this->_url = $url;
        $this->_urlParts = explode( "/", $this->_url );

        $this->_controller = $this->_getController();
        $this->_model = $this->_getModel();
        $this->_action = $this->_getAction();
        $this->_queryString = $this->_urlParts;

        var_dump($this);
    }


    /**
     * Get the controller name
     */
    private function _getController() {
        $controller = array_shift( $this->_urlParts );

        if( empty( $controller ) ) {
            $controller = 'index';
        }

        return $controller;
    }


    /**
     * Get the action name
     */
    private function _getAction() {
        $action = array_shift( $this->_urlParts );

        if( empty( $action ) ) {
            $action = 'index';
        }

        return $action;
    }


    /**
     * Get the model name
     */
    private function _getModel() {
        $model = rtrim( ucwords( $this->_controller ), 's' );
        return $model;
    }

    /**
     * Route the request
     */
    public function route() {

        $controller = ucwords($this->_controller) . 'Controller';
        $dispatch = new $controller( $this->_model, $this->_controller, $this->_action );

        if ( method_exists( $controller, $this->_action ) ) {
            call_user_func_array( array( $dispatch, $this->_action ), $this->_queryString );
        }
        else {
            // TODO 404 not found
        }

    }

}