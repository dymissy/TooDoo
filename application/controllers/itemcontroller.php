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

    public function add($list_id) {
        if( !$list_id ) {
            $this->_redirect('todolist');
        }

        if( isset($_POST['additem']) ) {
            $values = $_POST;
            $name = $_POST['text'];
            $desc = $_POST['description'];
            $error = array();

            if( empty($name) ) {
                $error['name'] = true;
            }

            if( empty($desc) ) {
                $error['description'] = true;
            }

            if( !empty($error) ) {
                $this->set('error', $error);
                $this->set('values', $values);
            } else {
                $this->Item->insert( array(
                    'text' => $name,
                    'list_id' => $list_id,
                    'description' => $desc,
                    'created_at' => $this->_now(),
                    'updated_at' => $this->_now(),
                    'priority' => 10
                ) );
                $this->_redirect('todolist/view/' . $list_id);
            }
        }

        $this->set('list_id', $list_id);
    }

}
