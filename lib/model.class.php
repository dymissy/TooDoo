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

    /**
     * Update a single row
     *
     */
    public function update( $id, $fields ) {
        if ( $id <= 0 ) {
            return false;
        }

        $query = sprintf( "UPDATE %s SET ", $this->_table );
        foreach( $fields as $field => $value ) {
            $query .= " {$field} = '{$value}', ";
        }
        $query = substr($query,0,strlen($query)-2);
        $query .= " WHERE id = " . $id;

        $db   = DB::getInstance();
        $count = $db->exec( $query );
        return $count > 0;
    }

    /**
     * Insert a new row
     */
    public function insert( $data ) {
        if( empty($data) ) {
            return false;
        }

        $fields = $values = '';


        foreach( $data as $field => $value ) {
            $fields .= " {$field}, ";
            $values .= " \"{$value}\", ";
        }
        $fields = substr($fields,0,strlen($fields)-2);
        $values = substr($values,0,strlen($values)-2);
        $query = sprintf( "INSERT INTO %s ( %s ) VALUES ( %s );", $this->_table, $fields, $values );

        $db   = DB::getInstance();
        $count = $db->exec( $query );
        return $count > 0;
    }
}

