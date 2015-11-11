<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 10/11/2015
 * Time: 20:32
 */
require "../Config.inc.php";
require "../View/CadUser.html";

$data = filter_input_array(INPUT_POST,FILTER_DEFAULT);
$del= array_pop($data);
//$cad = new Create();
//$cad->ExeCreate('pessoas',$data);
var_dump($data);

