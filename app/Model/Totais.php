<?php
include_once '../app/Config.inc.php';
class Totais{

    public static function Palestrante(){
        $read = new Read ();
        $read->FullRead("SELECT *
FROM autor_trabalho
INNER JOIN pessoas ON autor_trabalho.codigo_autor = pessoas.codigo
INNER JOIN trabalhos ON autor_trabalho.codigo_trabalho = trabalhos.codigo
WHERE  trabalhos.status = 'a'");
        return $read->getRowCount();
    }
    public static function Alunos(){
        $read = new Read ();
        $read->ExeRead('pessoas', "where nivel = 0");
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
        $read->ExeRead('trabalhos', "where status = 'N'");
        return $read->getRowCount();
    }
    public static function Palestras(){
        $read = new Read ();
        $read->ExeRead('trabalhos',"where tipo_atividade = 1 and status = 'A' ");
        return $read->getRowCount();
    }
}

?>