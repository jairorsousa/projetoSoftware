<?php
/**
 * Created by PhpStorm.
 * User: jairo.sousa
 * Date: 09/10/2015
 * Time: 14:01
 */

$class = $_GET['c'];
$metado = $_GET['m'];
$parametro = $_GET['p'];
require_once 'app/Controller/'.$class.'.php';
$obj = new $class();
$obj->$metado($parametro);