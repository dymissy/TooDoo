<?php

class ItemController extends Controller {

    public function __construct( $model, $controller, $action ) {
        $this->_getModel( $model );

        parent::__construct( $model, $controller, $action );
    }

    public function delete( $item_id, $list_id ) {
        $this->Item->delete($item_id);
        $this->_redirect( 'todolist/view/' . $list_id );
    }

    public function update() {
        $this->_render = false;

        $id = $_POST['item'] * 1;
        $fields[ $_POST['field'] ] = $_POST['value'];
        $fields[ 'updated_at' ] = $this->_now();

        if( $this->Item->update( $id, $fields ) ) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

}
