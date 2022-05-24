<?php
class IconsController{
    public static $path = upload.'/icons/apps/';
    public static function app($name){
        $sql = "SELECT path FROM icons WHERE tags LIKE '%$name%' LIMIT 1";
        if(mysqli_num_rows(mysqli_query(conn(), $sql)) > 0){
            $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
            return self::$path.$res['path'];
        }else{
            return self::$path.'default.png';
        }
    }
}
?>