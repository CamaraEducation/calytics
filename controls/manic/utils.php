<?php
class ManicUtils{
    public static function date_fix($time){
        $time = explode(' ', $time);
        $time = implode('-', array_reverse(explode('/', $time[0]))) .' '. $time[1];
        return $time;
    }

    public static function get_ranger($from, $to){
        $from = self::date_fix($from);
        $to	  = self::date_fix($to);
        $time = strtotime($to)-strtotime($from)/60;
        return date("H:i:s", $time);
    }
}