<?php
session_start();

if(isset($_SESSION['flag']))
{
$_SESSION['flag'] = 0;
$_SESSION['start'] = time();
}
else
{
	 $_SESSION['flag'] = 1;
	header( 'Location:index.php' ) ;
}
?>
