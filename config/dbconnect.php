<?php

	// this will avoid mysql_connect() deprecation error.
	error_reporting( ~E_DEPRECATED & ~E_NOTICE );
	// but I strongly suggest you to use PDO or MySQLi.
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', 'root9080');
	define('DBCOMP', 'company');
	define('DBAPP', 'applicant');
	
	//$comp = mysqli_connect(DBHOST,DBUSER,DBPASS,DBCOMP);
	$app  = mysqli_connect(DBHOST,DBUSER,DBPASS,DBAPP);
	
	/*if ( !$comp) {
		die("Connection failed : " . mysql_error());
	}*/
	
	if ( !$app ) {
		die("Connection failed : " . mysql_error());
	}