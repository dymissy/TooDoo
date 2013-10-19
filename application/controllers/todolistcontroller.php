<?php

class TodolistController extends Controller {

    public function __construct($model, $controller, $action) {
        $this->_getModel($model);

        parent::__construct($model, $controller, $action);
    }

    public function index() {
        $this->set( 'lists', $this->Todolist->fetchAll() );
    }

    public function view( $id ) {
        $this->set('list', $this->Todolist->load( $id ) );

        $item = new Item();
        $this->set( 'items', $item->fetchAllByListId( $id ) );
    }

}
