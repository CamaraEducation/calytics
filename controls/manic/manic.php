<?php
class ManicController{
	public static function import($id){
		$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
	
		if(in_array($_FILES["file"]["type"],$allowedFileType)){

			$targetPath = FileUploader::upload($file = 'file', $dir = 'sheet/manic/' );	
			$Reader = new SpreadsheetReader($targetPath);			
			$data = self::check_type($Reader);

			switch($data){
				case 'apps'	: self::uploadApps($id, $Reader, 1);  break;
				case 'data'	: self::uploadData($id, $Reader, 1);  break;
				case 'usage': self::uploadUsage($id, $Reader, 1); break;
			}

		}else {
			header('HTTP/1.1 500 Internal Server Error');
		}
	}

	public static function uploadApps($id, $Reader, $sheetCount){
		for($i=0;$i<$sheetCount;$i++){
			
			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row){
				
				if($i > 0 or $Row[0] == 'Name'){continue;}

				$sid        = mysqli_real_escape_string(conn(), $id);
				$start_time = mysqli_real_escape_string(conn(), $Row[1]);
				$end_time   = mysqli_real_escape_string(conn(), $Row[2]);
				$duration   = mysqli_real_escape_string(conn(), $Row[3]);
				$process    = mysqli_real_escape_string(conn(), $Row[4]);
	
				if (!empty($sid) and !empty($start_time) and !empty($end_time) and !empty($duration) and !empty($process)) {
					$sq = "INSERT INTO manic_apps VALUES (DEFAULT, '$sid', '$start_time', '$end_time', '$duration', '$process', DEFAULT)";
					if(mysqli_query(conn(), $sq)):
					else:
						$start_time = ManicUtils::date_fix($start_time);
						$end_time = ManicUtils::date_fix($end_time);
						mysqli_query(conn(), $sq);
					endif;
				}else{
					header('HTTP/1.1 500 Internal Server Error');
				}
			}
		}
	}

	public static function uploadData($id, $Reader, $sheetCount){
		for($i=0;$i<$sheetCount;$i++){
			
			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row){
				
				if($i > 0 or $Row[0] == 'Name'){continue;}

				$sid        = mysqli_real_escape_string(conn(), $id);
				$start_time = mysqli_real_escape_string(conn(), $Row[1]);
				$end_time   = mysqli_real_escape_string(conn(), $Row[2]);
				$duration   = mysqli_real_escape_string(conn(), $Row[3]);
				$domain     = mysqli_real_escape_string(conn(), $Row[4]);
	
				if (!empty($sid) and !empty($start_time) and !empty($end_time) and !empty($duration) and !empty($domain)) {
					$sq = "INSERT INTO manic_files VALUES (DEFAULT, '$sid', '$start_time', '$end_time', '$duration', '$domain', DEFAULT)";
					if(mysqli_query(conn(), $sq)):
					else:
						$start_time = ManicUtils::date_fix($start_time);
						$end_time = ManicUtils::date_fix($end_time);
						mysqli_query(conn(), $sq);
					endif;
				}else{
					header('HTTP/1.1 500 Internal Server Error');
				}
			}
		}
	}

	public static function uploadUsage($id, $Reader, $sheetCount){
		for($i=0;$i<$sheetCount;$i++){
			
			$Reader->ChangeSheet($i);
			foreach ($Reader as $Row){
				
				if($i > 0 or $Row[0] == 'Name'){continue;}

				$sid        = mysqli_real_escape_string(conn(), $id);
				$status		= mysqli_real_escape_string(conn(), $Row[0]);
				$start_time = mysqli_real_escape_string(conn(), $Row[1]);
				$end_time   = mysqli_real_escape_string(conn(), $Row[2]);
				$duration   = mysqli_real_escape_string(conn(), $Row[3]);

				if (!empty($sid) and !empty($start_time) and !empty($end_time) and !empty($duration)) {
					$sq = "INSERT INTO manic_usage VALUES (DEFAULT, '$sid', '$status', '$start_time', '$end_time', '$duration', DEFAULT);";
					if(mysqli_query(conn(), $sq)):
					else:
						$start_time = ManicUtils::date_fix($start_time);
						$end_time = ManicUtils::date_fix($end_time);
						mysqli_query(conn(), $sq);
					endif;
				}else{
					header('HTTP/1.1 500 Internal Server Error');
				}

			}
		}
	}
	
	public static function check_type($Reader){
		$Reader->ChangeSheet(0);
		foreach ($Reader as $Row){
			if(!isset($Row[4])){
				return 'usage';
			}else if ($Row[4] == 'Domain'){
				return 'data';
			}else if ($Row[4] == 'Process'){
				return 'apps';
			}
		}
	}
}
?>