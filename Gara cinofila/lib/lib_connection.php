<?php
    require_once("lib_common.php");

	class Connection
	{
		private $conndb;
		
		public function connect()
		{
			$conndb = new mysqli(Common::$DBSERVERNAME, Common::$DBUSERNAME, Common::$DBPASSWORD, Common::$DBNAME);
			return $conndb;
		}
		
		public function disconnect()
		{
			$conndb->close();
		}
	}
?>