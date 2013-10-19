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
        $items = new Item();

        var_dump($items);
    }

}
