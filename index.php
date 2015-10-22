<?php
/**
 * Created by PhpStorm.
 * User: Jairo
 * Date: 07/10/2015
 * Time: 00:39
 */

$class = 'Inicio';
$metado = 'index';
require_once 'app/Controller/'.$class.'.php';
$obj = new $class();
$obj->$metado();