<?php
session_start();

if (isset($_SESSION['flag']))
{
define("USER_HOME_DIR", "/home/stud/s3337990");
require(USER_HOME_DIR . "/php/Smarty-3.1.11/libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/templates";
$smarty->compile_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/templates_c";
$smarty->cache_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/cache";
$smarty->config_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/configs";


$smarty->assign('list_of_wine', $_SESSION['arr']);
$smarty->display('list.tpl');

}
else
{
 header( 'Location:index.php' ) ;
}
?>



