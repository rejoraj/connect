<?php 
define("USER_HOME_DIR", "/home/stud/s3337990");
require(USER_HOME_DIR . "/php/Smarty-3.1.11/libs/Smarty.class.php");
$smarty = new Smarty();
$smarty->template_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/templates";
$smarty->compile_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/templates_c";
$smarty->cache_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/cache";
$smarty->config_dir = USER_HOME_DIR . "/php/Smarty-Work-Dir/configs";


$wine_name=$_GET["wine_name"]; 
$winery_name=$_GET["winery_name"]; 
$region=$_GET["region"]; 
$variety=$_GET["variety"]; 
$start=$_GET["start"]; 
$end=$_GET["end"]; 
$min_stock=$_GET["min_stock"]; 
$min_order=$_GET["min_order"]; 
$base_price=$_GET["base_price"]; 
$max_price=$_GET["max_price"];

if ($wine_name != "")
{
$wine_name = "%" . $wine_name . "%" ;
}

if ($winery_name != "")
{
$winery_name = "%" . $winery_name . "%" ;
}




require 'dbpdo.php';



$query="SELECT wine_name, variety, year, winery_name,region_name,cost, 
on_hand,sum(qty),sum(price)
FROM wine,winery,region,grape_variety,wine_variety,inventory, items
WHERE wine.winery_id = winery.winery_id
AND winery.region_id = region.region_id
AND wine.wine_id = wine_variety.wine_id
AND wine_variety.variety_id = grape_variety.variety_id
AND wine.wine_id = inventory.wine_id
AND wine.wine_id = items.wine_id
";


if (isset($wine_name) && $wine_name !="") {
    $query .= " AND wine_name LIKE '{$wine_name}'";
  }

if (isset($winery_name) && $winery_name !="") {
    $query .= " AND winery_name LIKE '{$winery_name}'";
  }

if (isset($region) && $region != "All") {
    $query .= " AND region_name = '{$region}'";
  }

if (isset($variety) && $variety != "All") {
    $query .= " AND variety = '{$variety}'";
  }

if (isset($start) && isset($end)) {
    $query .= " AND year BETWEEN '{$start}' AND '{$end}'";
  }

if (isset($base_price) && isset($max_price)){
   $query .= " AND cost BETWEEN '{$base_price}' AND '{$max_price}'";
  }

if (isset($min_stock) && $min_stock !="") {
    $query .= " AND on_hand  >= '{$min_stock}'";
  }


$query .= " GROUP BY wine_name, variety, year, 
winery_name,region_name,cost";

if (isset($min_order) && $min_order !="") {
    $query .= " HAVING sum(qty) >= '{$min_order}'";
  }


	$count=0;
	foreach ($db->query($query) as $row)
	{
		$result_array[] = $row;
		$count++;
	}


        $rowsFound = $count;



$smarty->assign('region', $region);
$smarty->assign('rowsFound', $rowsFound);
$smarty->assign('row',  $result_array);
$smarty->display('home1.tpl');

?>
