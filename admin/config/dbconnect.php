<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', 'root9080');
	define('DBCOMP', 'company');
	
	
	//$comp = mysqli_connect(DBHOST,DBUSER,DBPASS,DBCOMP);
	$comp  = mysqli_connect(DBHOST,DBUSER,DBPASS,DBCOMP);
	
	/*if ( !$comp) {
		die("Connection failed : " . mysql_error());
	}*/
	
	if ( !$comp ) {
		die("Connection failed : " . mysql_error());
	}