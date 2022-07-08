<?php
class PortalReports{
	public static function fetch_report(){
		$range = self::get_range();

		$live = self::date_liveTime_graph($range['from'], $range['to']);
		$sess = self::date_session_graph($range['from'], $range['to']);
		$apps = self::applets_stats($range['from'], $range['to'], 10);
		$docs = self::doc_stats($range['from'], $range['to'], 10);
		$videos = self::video_stats($range['from'], $range['to'], 10);


		$response = ["live"=>$live, "sess"=>$sess, "apps"=>$apps, "docs"=>$docs, "videos"=>$videos];
		echo json_encode($response);
	}

	public static function unique_sessions(){
		$range = self::get_range();
		$from = $range['from'];
		$to = $range['to'];

        $sql = "SELECT COUNT(DISTINCT identifier) as sess FROM `portal_usage` WHERE year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to'";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));

        return $res['sess'];
    }
    
    public static function live_time(){
		$range = self::get_range();
		$from = $range['from'];
		$to = $range['to'];

        $sql = "SELECT SUM(live) as live FROM `portal_usage` WHERE year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to'";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));

        return TimeController::calc($res['live']/1000);
    }

    public static  function unique_schools(){
		$range = self::get_range();
		$from = $range['from'];
		$to = $range['to'];

        $sql = "SELECT COUNT(DISTINCT sid) as schools FROM `portal_usage` WHERE year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to'";
        $res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));

        return $res['schools'];
    }

	public static function get_range(){
		$range = mysqli_real_escape_string(conn(), str_replace('/', '-', $_POST['date_range']));
		$range = explode(' - ', $range);

		$from = explode('-', $range[0]);
		$to = explode('-', $range[1]);

		$from = $from[2].'-'.$from[0].'-'.$from[1];
		$to = $to[2].'-'.$to[0].'-'.$to[1];

		return array('from'=>$from, 'to'=>$to);
	}

	public static function date_liveTime_graph($from, $to, $id=''){
		$sql = "SELECT SUM(live) as live, date(created) as `date` FROM portal_usage WHERE year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to' GROUP by date(created)";
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


	public static function date_session_graph($from, $to, $id=''){
		$sql = "SELECT COUNT(DISTINCT identifier) as identifier, date(created) as `date` FROM portal_usage WHERE year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to' GROUP by date(created)";
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

	public static function applets_stats($from, $to, $limit = ''){
        if(empty($limit)):
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='app' AND year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to' GROUP BY title";
        else:
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='app' AND year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to' GROUP BY title ORDER BY activity desc LIMIT $limit";
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

    public static function video_stats($from, $to, $limit = ''){
        if(empty($limit)):
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='video' AND year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to' GROUP BY title";
        else:
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='video' AND year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to' GROUP BY title ORDER BY activity desc LIMIT $limit";
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

    public static function doc_stats($from, $to, $limit = ''){
        if(empty($limit)):
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='doc' AND year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to'  GROUP BY title";
        else:
            $sql = "SELECT title, COUNT(title) as activity FROM `portal_content` WHERE type='doc' AND year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to'  GROUP BY title ORDER BY activity desc LIMIT $limit";
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

    public static function content_distro($from, $to, $id=''){
        $sql = "SELECT type, COUNT(type) as total FROM portal_content WHERE year(created) = year(now()) AND date(created) BETWEEN '$from' AND '$to' GROUP by type";
        $res = mysqli_fetch_all(mysqli_query(conn(), $sql), MYSQLI_ASSOC);

        $type = array();
        $total = array();
        foreach($res as $r){
            $type[] = $r['type'];
            $total[] = $r['total'];
        }

        return array('type'=>$type, 'total'=>$total);
    }
}