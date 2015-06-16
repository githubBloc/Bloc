<?php
	session_start();
	if(isset($_SESSION['Email']))
	{echo "1";
	unset($_SESSION['Time']);
	unset($_Session['Email']);
	unset($_Session['FirstName']);
	session_destroy();}
?>	