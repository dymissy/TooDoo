<?php

/**
 * Class Model
 *
 */

abstract class Model extends SQLQuery {

    protected $_model;
    protected $_table;

    /**
     * Constructor
     *
     */
    function __construct() {

		$this->connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->_model = get_class($this);
		$this->_table = strtolower($this->_model)."s";
	}

}
