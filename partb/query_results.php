<?php $wine_name=$_GET["wine_name"]; $winery_name=$_GET["winery_name"]; 
$region=$_GET["region"]; $variety=$_GET["variety"]; $start=$_GET["start"]; 
$end=$_GET["end"]; $min_stock=$_GET["min_stock"]; 
$min_order=$_GET["min_order"]; $base_price=$_GET["base_price"]; 
$max_price=$_GET["max_price"];

if ($wine_name != "")
{
$wine_name = "%" . $wine_name . "%" ;
}

if ($winery_name != "")
{
$winery_name = "%" . $winery_name . "%" ;
}



function showerror() {
     die("Error " . mysql_errno() . " : " . mysql_error());
  }

require 'db.php';

function displayList($connection,$query,$wine_name) 
{
	 if (!($result = @ mysql_query ($query, $connection))) 
	{ 
      		showerror();
	}

$rowsFound = @ mysql_num_rows($result);
if ($rowsFound > 0) 
{
print "Wines of $regionName<br>";

print "\n<table>\n<tr>\n\t" .
      "<th>Wine Name</th>\n\t"  .
      "<th>Variety</th>\n\t" .
      "<th>Year</th>\n\t" .
      "<th>Winery</th>\n\t" .
      "<th>Region</th>\n\t" .
      "<th>Cost</th>\n\t" .
      "<th>Quantity</th>\n\t" .
      "\n\t\t\t<th>Stock Sold</th>\n\t" .
      "\n\t<th>Sales Revenue</th>\n\t";
while ($row = @ mysql_fetch_array($result)) {

echo "\n<tr>\n\t<td>{$row["wine_name"]}</td>" .
"\n\t<td>{$row["variety"]}</td>" .
"\n\t<td>{$row["year"]}</td>" .
"\n\t<td>{$row["winery_name"]}</td>" .
"\n\t<td>{$row["region_name"]}</td>" .
"\n\t<td>{$row["cost"]}</td>" .
"\n\t<td><div align = 'center'>{$row["on_hand"]}</div></td>" .
"\n\t<td><div align = 'center'>{$row["sum(qty)"]}</div></td>" .
"\n\t<td><div align = 'center'>{$row["sum(price)"]}</div></td>
";
}

echo "\n</table>";
print "{$rowsFound}";
}
else
{
echo "\n\n Your search criteria did not match any data in the database";
}
}



if (!($connection = @ mysql_connect(DB_HOST, DB_USER, DB_PW))) {
    die("Could not connect"); 
}

$query="SELECT wine_name, variety, year, winery_name,region_name,cost, on_hand
,sum(qty),sum(price)
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

$query .= " GROUP BY wine_name, variety, year, 
winery_name,region_name,cost";

 displayList($connection, $query, $wine_name);


?>
