<?php
session_start();

if (isset($_SESSION['flag']))
{
unset($_SESSION['flag']);
session_unset();
session_destroy();
}
 header( 'Location:index.php' ) ;

?>
