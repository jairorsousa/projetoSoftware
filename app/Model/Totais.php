<?php
include_once '../app/Config.inc.php';
class Totais{

    public static function Palestrante(){
        $read = new Read ();
        $read->ExeRead('pessoas');
        return $read->getRowCount();
    }
    public static function Alunos(){
        $read = new Read ();
        $read->ExeRead('pessoas');
        return $read->getRowCount();
    }
    public static function Minicurso(){
        $read = new Read ();
        $read->ExeRead('trabalhos',"where tipo_atividade = 2 and status = 'A'");
        return $read->getRowCount();
    }
    public static function Banners(){
        $read = new Read ();
       // $read->ExeRead('pessoas');
        $read->ExeRead('trabalhos',"where tipo_atividade = 3 and status = 'A' ");
        return $read->getRowCount();
    }
    public static function Trabalhos(){
        $read = new Read ();
        $read->ExeRead('trabalhos');
        return $read->getRowCount();
    }
    public static function Palestras(){
        $read = new Read ();
        $read->ExeRead('trabalhos',"where tipo_atividade = 1 and status = 'A' ");
        return $read->getRowCount();
    }
}

?>