<?php

class Item extends Model {

    public function fetchAllByListId( $list_id ) {
        $db = DB::getInstance();
        $stmt = $db->query(sprintf("SELECT * FROM %s WHERE list_id = %d", $this->_table, $list_id));
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

}