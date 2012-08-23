<?php
define("USER_HOME_DIR", "/home/stud/s3337990");
require(USER_HOME_DIR . "/php/Smarty-3.1.11/libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/templates";
$smarty->compile_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/templates_c";
$smarty->cache_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/cache";
$smarty->config_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/configs";



require_once('dbpdo.php');

//country drop down list




$query = "SELECT *  FROM region ORDER BY region_name ";
foreach ($db->query($query) as $row) 
{
	$region_select[] = $row;
}



//variety drop down list

$query = "SELECT *  FROM grape_variety ORDER BY variety";
foreach ($db->query($query) as $row)
{
	$variety_select[] =  $row;
}

//year code
$query = "SELECT DISTINCT year FROM wine ORDER BY year";
foreach ($db->query($query) as $row)
{
	$year_start_select[] = $row;
}

$query = "SELECT DISTINCT year FROM wine ORDER BY year DESC";
foreach ($db->query($query) as $row)
{
	$year_end_select[] = $row;
}



$smarty->assign('file_name', 'smarty.php');
$smarty->assign('region_select', $region_select);
$smarty->assign('variety_select', $variety_select);
$smarty->assign('year_start_select', $year_start_select);
$smarty->assign('year_end_select', $year_end_select);
$smarty->display('input.tpl');


?>

