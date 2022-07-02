<?php
    class PortalJobs{
		public static function import_data(){
			$file = self::fetch_imports();
			$data = file_get_contents(upload.'/portal/'.$file);

			PortalApi::init($data);
		}

		public static function fetch_imports(){
			$sql = "SELECT * from portal_jobs limit 1";
			$res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));

			return $res['file'];
		}
	}