<?php
	function connectDB(){
		$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=basdatb");

		if (!$conn) {
			die("Connection failed: " . pg_last_error());
		}

		$sql = "SET search_path TO SIANGBANG";
		$result = pg_query($conn, $sql);
		if (!$result) {
			die("Error in SQL query: " . pg_last_error());
		}

		return $conn;
	}
?>