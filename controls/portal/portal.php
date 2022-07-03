<?php
class PortalController{
    public static function unique_sessions(){
        $sql = "SELECT COUNT(DISTINCT identifier) as sess FROM `portal_usage` WHERE year(created) = year(now())";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));

        return $res['sess'];
    }
    
    public static function live_time(){
        $sql = "SELECT SUM(live) as live FROM `portal_usage` WHERE year(created) = year(now())";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));

        return TimeController::calc($res['live']/1000);
    }

    public static  function unique_schools(){
        $sql = "SELECT COUNT(DISTINCT sid) as schools FROM `portal_usage` WHERE year(created) = year(now())";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));

        return $res['schools'];
    }

    public static function date_session_graph(){
        $sql = "SELECT COUNT(DISTINCT identifier) as identifier, date(created) as `date` FROM portal_usage WHERE year(created) = year(now()) GROUP by date(created)";
        $res = mysqli_query(conn(), $sql);

        # separate $res results date and duration as separate arrays for chart
        $date = array();
        $sess = array();
        foreach($res as $r){
            $date[] = $r['date'];
            $sess[] = $r['identifier'];
        }
        return array('date'=>$date, 'sess'=>$sess);
    }

    public static function month_session_graph(){
        for($i=0; $i<12; $i++){
            $sql = "SELECT COUNT(DISTINCT identifier) as identifier FROM portal_usage WHERE MONTH(created) = '$i' AND year(created) = year(now())";
            $sql = mysqli_fetch_assoc(mysqli_query(conn(), $sql));

            $res[] = $sql['identifier'];
        }
        return $res;
    }

    public static function date_liveTime_graph(){
        $sql = "SELECT SUM(live) as live, date(created) as `date` FROM portal_usage WHERE year(created) = year(now()) GROUP by date(created)";
        $res = mysqli_query(conn(), $sql);

        # separate $res results date and duration as separate arrays for chart
        $date = array();
        $live = array();
        foreach($res as $r){
            $date[] = $r['date'];
            $live[] = ($r['live']/1000)/3600;
        }
        return array('date'=>$date, 'live'=>$live);
    }

    public static function month_liveTime_graph(){
        for($i=0; $i<12; $i++){
            $sql = "SELECT SUM(live) as live FROM portal_usage WHERE MONTH(created) = '$i' AND year(created) = year(now())";
            $sql = mysqli_fetch_assoc(mysqli_query(conn(), $sql));

            $res[] = ($sql['live']/1000)/3600;
        }
        return $res;
    }

    public static function applets_stats($limit = ''){
        if(empty($limit)):
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='app' AND year(created) = year(now()) GROUP BY title";
        else:
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='app' AND year(created) = year(now()) GROUP BY title ORDER BY activity desc LIMIT $limit";
        endif;

        
        $res = mysqli_fetch_all(mysqli_query(conn(), $sql), MYSQLI_ASSOC);

        # separate $res results date and duration as separate arrays for chart
        $title = array();
        $activity = array();
        foreach($res as $r){
            $title[] = $r['title'];
            $activity[] = $r['activity'];
        }
        return array('title'=>$title, 'activity'=>$activity);
    }

    public static function video_stats($limit = ''){
        if(empty($limit)):
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='video' AND year(created) = year(now()) GROUP BY title";
        else:
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='video' AND year(created) = year(now()) GROUP BY title ORDER BY activity desc LIMIT $limit";
        endif;

        
        $res = mysqli_fetch_all(mysqli_query(conn(), $sql), MYSQLI_ASSOC);

        # separate $res results date and duration as separate arrays for chart
        $title = array();
        $activity = array();
        foreach($res as $r){
            $title[] = $r['title'];
            $activity[] = $r['activity'];
        }
        return array('title'=>$title, 'activity'=>$activity);
    }

    public static function doc_stats($limit = ''){
        if(empty($limit)):
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='doc' AND year(created) = year(now()) GROUP BY title";
        else:
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='doc' AND year(created) = year(now()) GROUP BY title ORDER BY activity desc LIMIT $limit";
        endif;

        
        $res = mysqli_fetch_all(mysqli_query(conn(), $sql), MYSQLI_ASSOC);

        # separate $res results date and duration as separate arrays for chart
        $title = array();
        $activity = array();
        foreach($res as $r){
            $title[] = $r['title'];
            $activity[] = $r['activity'];
        }
        return array('title'=>$title, 'activity'=>$activity);
    }
}