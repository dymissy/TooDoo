<?php

class TodolistController extends Controller {

    public function __construct( $model, $controller, $action ) {
        $this->_getModel( $model );

        parent::__construct( $model, $controller, $action );
    }

    public function index() {
        $this->set( 'lists', $this->Todolist->fetchAll() );
    }

    public function view( $id ) {
        $this->set( 'list', $this->Todolist->load( $id ) );

        $item = new Item();
        $this->set( 'items', $item->fetchAllByListId( $id ) );
    }

    public function delete( $id ) {
        $this->Todolist->delete($id);
        $this->_redirect( 'todolist' );
    }

    public function update() {
        $this->_render = false;

        $id = $_POST['item'] * 1;
        $fields[ $_POST['field'] ] = $_POST['value'];
        if( $this->Todolist->update( $id, $fields ) ) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function add() {
        if( isset($_POST['addlist']) ) {
            $values = $_POST;
            $name = $_POST['name'];
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
                $this->Todolist->insert( array(
                    'name' => $name,
                    'description' => $desc,
                    'created_at' => $this->_now()
                ) );
                $this->_redirect('todolist');
            }
        }
    }

}
