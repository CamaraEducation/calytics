<?php class JobsController{
    public static function available(){
        $sql = "SELECT * from portal_jobs";
        $res = mysqli_query(conn(), $sql);
        return mysqli_fetch_all($res, MYSQLI_ASSOC);
    }

    public static function count(){
        $sql = "SELECT COUNT(*) as count from portal_jobs";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
        return $res['count'];
    }
}