<?php
/**
 * Created by PhpStorm.
 * User: jairo.sousa
 * Date: 25/09/2015
 * Time: 17:25
 */

class Check {

    private static $Data;
    private static $Format;

    public static function soNumero($str){
            return preg_replace("/[^0-9]/", "", $str);
    }

    public static function Email($Email) {
        self::$Data = (string) $Email;
        self::$Format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';

        if (preg_match(self::$Format, self::$Data)):
            return true;
        else:
            return false;
        endif;
    }

    public static function Data($Data) {
        self::$Format = explode(' ', $Data);
        self::$Data = explode('/', self::$Format[0]);

        if (empty(self::$Format[1])):
            self::$Format[1] = date('H:i:s');
        endif;

        self::$Data = self::$Data[2] . '-' . self::$Data[1] . '-' . self::$Data[0] . ' ' . self::$Format[1];
        return self::$Data;
    }

    public static function DataR($Data)
    {
        if (!empty($Data)) {
            $p_dt = explode('-', $Data);
            $data_br = $p_dt[2].'/'.$p_dt[1].'/'.$p_dt[0];
            return  $data_br;

        }
    }
}
