<?php
/**
 * TooDoo index file
 *
 * This file routes the url query string to the
 * appropriate controller
 *
 */

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

$url = '';
if( isset( $_GET['url'] ) ) {
    $url = $_GET['url'];
}

require_once (ROOT . DS . 'config' . DS . 'config.php');


require_once (ROOT . DS . 'lib' . DS . 'bootstrap.class.php');

$app = new Bootstrap();
$app->start();
