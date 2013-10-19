<?php

/**
 * Class Model
 *
 */
abstract class Model {

    protected $_model;
    protected $_table;

    /**
     * Constructor
     *
     */
    function __construct() {
		$this->_model = get_class($this);
		$this->_table = strtolower($this->_model)."s";
	}

    /**
     * Fetch all rows
     */
    public function fetchAll() {
        $db = DB::getInstance();
        $stmt = $db->query(sprintf("SELECT * FROM %s", $this->_table));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}
