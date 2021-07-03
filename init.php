<?php 
include "header.php";
$GLOBALS['config'] = array(
    'mysql' => array(
        'host'     => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db'       => 'hospital'
    )
);
spl_autoload_register(function($class){
    require_once 'classes/'.$class.'.php';
});