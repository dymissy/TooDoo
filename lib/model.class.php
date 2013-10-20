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
        $this->_model = get_class( $this );
        $this->_table = strtolower( $this->_model ) . "s";
    }

    /**
     * Fetch all rows
     */
    public function fetchAll() {
        $db   = DB::getInstance();
        $stmt = $db->query( sprintf( "SELECT * FROM %s", $this->_table ) );
        return $stmt->fetchAll( PDO::FETCH_OBJ );
    }

    /**
     * Load single row
     */
    public function load( $id ) {
        if ( $id <= 0 ) {
            return false;
        }

        $db   = DB::getInstance();
        $stmt = $db->query( sprintf( "SELECT * FROM %s WHERE id = %d", $this->_table, $id ) );
        return $stmt->fetch( PDO::FETCH_OBJ );
    }

    /**
     * Delete single row
     */
    public function delete( $id ) {
        if ( $id <= 0 ) {
            return false;
        }

        $db   = DB::getInstance();
        $count = $db->exec( sprintf( "DELETE FROM %s WHERE id = %d", $this->_table, $id ) );
        return $count > 0;
    }
}
