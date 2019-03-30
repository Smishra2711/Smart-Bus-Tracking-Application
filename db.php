<?php
	$con = mysqli_connect("remotemysql.com","YxfwfwV9vT","FRdYN06M1V","YxfwfwV9vT") or die("unable to connect");
?>
<?php
/*
	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	define('DBHOST', 'remotemysql.com');
	define('DBUSER', 'YxfwfwV9vT');
	define('DBPASS', 'FRdYN06M1V');
	define('DBNAME', 'YxfwfwV9vT');
	
	$conn = mysql_connect(DBHOST,DBUSER,DBPASS);
	$dbcon = mysql_select_db(DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysql_error());
	}
	
	if ( !$dbcon ) {
		die("Database Connection failed : " . mysql_error());
		//echo("Connection Failed");
	}
	*/
?>