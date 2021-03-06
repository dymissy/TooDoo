<?php

/**
 * Class Controller
 */

abstract class Controller {

    protected $_model;
    protected $_controller;
    protected $_action;
    protected $_template;
    protected $_render = true;

    /**
     * Constructor
     *
     * @param $model
     * @param $controller
     * @param $action
     */
    public function __construct( $model, $controller, $action ) {

        $this->_controller = $controller;
        $this->_action     = $action;
        $this->_model      = $model;

        $this->_template = new Template( $controller, $action );
    }

    /**
     * Set template variables
     *
     * @param $name
     * @param $value
     */
    public function set( $name, $value ) {
        $this->_template->set( $name, $value );
    }

    /**
     * Create an instance of the model
     *
     * @param $model
     */
    protected function _getModel( $model ) {
        $this->$model = new $model;
    }

    /**
     * Redirect to a specific url
     */
    protected function _redirect( $url, $external = false ) {
        if ( $external ) {
            header( 'Location: ' . $url );
        }
        else {
            header( 'Location: ' . HOME_URL . $url );
        }

        exit();
    }

    /**
     * Render the template
     *
     */
    public function __destruct() {
        if( $this->_render ) {
            $this->_template->render();
        }
    }


    /**
     * Simulate MySQL NOW() function
     */
    protected function _now() {
        return date("Y-m-d H:i:s");
    }

}
