<?php
class ProjectController{
    public static function create(){
        $sql = "";
        mysqli_query(conn(), $sql);
        return true;
    }

    public static function count(){
        $sql = "SELECT COUNT(id) as total FROM projects";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
        return $res['total'];
    }

    public static function fetch_all(){
        $sql = "SELECT * FROM projects";
        $res = mysqli_fetch_all(mysqli_query(conn(), $sql), MYSQLI_ASSOC);
        return $res;
    }

    //count user projects
    public static function count_upr($id){
        $sql = "SELECT pid FROM users WHERE id = '$id'";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
        $pid = $res['pid'];

        if(strpos($pid, ',') !== false){
            $count = count(explode(',', $pid));
        }else{
            $count = 1;
        }
        
        return $count;
    }
}
?>