<?php
/**
 * Created by PhpStorm.
 * User: jairo.sousa
 * Date: 25/09/2015
 * Time: 17:01
 */

define('BASE', 'http://www.deepday.com.br/sigea/');


// CONFIGRAÇÕES DO SITE ####################
define('HOST', 'mysql524.umbler.com');
define('USER', 'sigea');
define('PASS', 'sigea@321');
define('DBSA', 'sigea');

// AUTO LOAD DE CLASSES ####################
function __autoload($Class) {

    $cDir = ['Conn','CRUD','Model','Helper', 'Controller'];
    $iDir = null;

    foreach ($cDir as $dirName):
        if (!$iDir && file_exists(__DIR__ . "/{$dirName}/{$Class}.php") && !is_dir(__DIR__ . "/{$dirName}/{$Class}.php")):
            include_once (__DIR__ . "/{$dirName}/{$Class}.php");
            $iDir = true;
        endif;
    endforeach;

    if (!$iDir):
        trigger_error("Não foi possível incluir {$Class}.php");
        die;
    endif;
}