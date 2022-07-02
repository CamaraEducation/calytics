<?php
    class PortalJobs{
		public static function import_data(){
			$file = self::fetch_imports();
			$data = file_get_contents(upload.'/portal/'.$file);

			PortalApi::init($data);
		}

		public static function fetch_imports($id = ''){
			if(empty($id)): $sql = "SELECT * from portal_jobs limit 1";
				else: 		$sql = "SELECT * from portal_jobs where id='$id' limit 1";
			endif;

			$res = mysqli_fetch_assoc(mysqli_query(conn(), $sql));

			self::delete_job($res['id']);
			return $res['file'];
		}

		public static function do_job($id){
			$file = self::fetch_imports($id);
			$data = file_get_contents(upload.'/portal/'.$file);

			PortalApi::init($data);
		}

		public static function delete_job($id){
			$sql = "DELETE from portal_job where id='$id'";
			mysqli_query(conn(), $sql);
		}
	}