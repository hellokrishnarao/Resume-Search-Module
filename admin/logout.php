<?php

	session_start();
	
	if (!isset($_SESSION['adminId'])) {
		header("Location: Signin/");
	}
	else
	{
		unset($_SESSION['adminId']);
		session_unset();
		session_destroy();
		header("Location: ../");
		exit;
	}