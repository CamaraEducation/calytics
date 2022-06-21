<?php

class PortalApi{
	public static function init($data){
		$data = json_decode($data, true);
		$content = $data['content'];
		$general = $data['general'];
		
		foreach($content as $key => $data){
			$sid = self::sc_check($data);
			self::content(
				$sid,
				$data['title'],
				$data['type'],
				$data['class'],
				$data['age'],
				$data['role'],
				$data['sync']
			);            
		}

		foreach($general as $key => $data){
			$sid = self::sc_check($data);
			self::general(
				$sid,
				$data['uri'],
				$data['identifier'],
				$data['class'],
				$data['age'],
				$data['role'],
				$data['time'],
				$data['created']
			);            
		}
	}

	public static function sc_check($data){
		$school = $data['school'];
		$region = $data['region'];

		$sql = "SELECT id FROM schools WHERE sc_name = '$school' AND sc_region = '$region'";
		$res = mysqli_query(conn(), $sql);

		if(mysqli_num_rows($res) > 0){
			$res = mysqli_fetch_assoc($res);
		}else{
			$res = self::sc_add(
				$school,
				$data['category'],
				$data['ownership'],
				$region,
				$$data['country'],
			);
		}

		return $res['id'];
	}

	public static function sc_add($name, $level, $owner, $region, $country){
		if(!empty($name)){
			$sql = "INSERT INTO schools VALUES (DEFAULT, '$name', '$level', '$owner', '$region', '$country', DEFAULT, DEFAULT)";
			if(mysqli_query(conn(), $sql)){
				return self::sc_check(['school'=>$name, 'region'=>$region]);
			}
		}
	}

	public static function content($sid, $title, $type, $class, $age, $role, $created){
		$sql = "INSERT INTO portal_content VALUES (DEFAULT, '$sid', '$title', '$type', '$class', '$age', '$role', '$created', DEFAULT)";
		mysqli_query(conn(), $sql);        
	}

	public static function general($sid, $uri, $identifier, $class, $age, $role, $live, $created){
		$sql = "INSERT INTO portal_usage VALUES (DEFAULT, '$sid', '$uri', '$identifier', '$class', '$age', '$role', '$live', '$created', DEFAULT)";
		mysqli_query(conn(), $sql);
	}

	public static function add_job($file){
		$sql = "INSERT INTO portal_jobs VALUES (DEFAULT, '$file', DEFAULT)";
		mysqli_query(conn(), $sql);
	}
}