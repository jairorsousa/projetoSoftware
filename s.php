<?php
/**
 * Created by PhpStorm.
 * User: Jairo
 * Date: 07/10/2015
 * Time: 01:06
 */
$class = $_GET['c'];
$metado = $_GET['m'];
require_once 'app/Controller/'.$class.'.php';
$obj = new $class();
$obj->$metado();