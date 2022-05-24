<?php
class ManicStatsController extends ManicController{
    public static function top_apps($i){
        $sql = "SELECT SUM(duration) as duration, app_name as name FROM manic_apps GROUP BY app_name ORDER BY SUM(duration) DESC LIMIT $i";
        $res = mysqli_fetch_all(mysqli_query(conn(), $sql), MYSQLI_ASSOC);
        return $res;
    }

    public static function count_utime_away(){
		for($i=0; $i<12; $i++){
            $sql[0] = "SELECT SUM(duration) as duration FROM manic_usage WHERE MONTH(start_time) = '".date('m', strtotime('-'.$i.' month'))."' AND YEAR(start_time) = '".date('Y', strtotime('-'.$i.' month'))."'";
        }
	}

    public static function active_schools($limit){
        $sql = "SELECT sid, SUM(duration) AS duration FROM manic_usage GROUP BY sid ORDER BY SUM(duration) DESC LIMIT $limit";
        $res = mysqli_fetch_all(mysqli_query(conn(), $sql), MYSQLI_ASSOC);
        return $res;
    }

    public static function uptime(){
        for($i=0; $i<12; $i++){
            $sql = "SELECT SUM(duration) as uptime FROM manic_usage WHERE status='active' AND MONTH(start_time)='$i' AND YEAR(start_time)=YEAR(CURRENT_TIMESTAMP)";
            $time = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
            $res[$i] = $time['uptime']/3600;;
        }
        return $res;
    }

    public static function active_away(){
        for($i=0; $i<12; $i++){
            $sql = "SELECT 
                (SELECT SUM(duration) FROM manic_usage WHERE status='active' AND MONTH(start_time)='$i' AND YEAR(start_time)=YEAR(CURRENT_TIMESTAMP)) AS active, 
                (SELECT SUM(duration) FROM manic_usage WHERE status='away' AND MONTH(start_time)='$i' AND YEAR(start_time)=YEAR(CURRENT_TIMESTAMP)) AS away";
            $time = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
            $utime['active'][$i] = $time['active']/3600;
            $dtime['away'][$i] = $time['away']/3600;
        }
        return array_merge($utime, $dtime);
    }

    public static function sc_active($id){
        for($i=0; $i<12; $i++){
            $sql = "SELECT SUM(duration) as active FROM manic_usage WHERE status='active' AND MONTH(start_time)='$i' AND YEAR(start_time)=YEAR(CURRENT_TIMESTAMP) AND sid='$id'";
            $time = mysqli_fetch_assoc(mysqli_query(conn(), $sql));
            $res[$i] = $time['active']/3600;
        }
        return $res;
    }
}
?>