<html>
<head>
</head>
<body>
<form action="query_results.php" method="GET">

Enter  a wine name(or part of the wine name):
<input type="text" name="wine_name" value="">
<br>
Enter a winery name(or part of a winery name :
<input type="text" name="winery_name" value="">
<br>
Select the region:
<?php
require_once('db.php');

//country drop down list

$query = "SELECT *  FROM region ORDER BY region_name ";
$output = mysql_query($query, $dbconn);
echo "<select name='region'>";
while($row = mysql_fetch_row($output))
{
echo("<option value='$row[1]'> $row[1]</option>"); 
}
echo "</select>";
echo "</br>";

//variety drop down list

$query = "SELECT *  FROM grape_variety ORDER BY variety";
$output = mysql_query($query, $dbconn);
echo "Select the grape variety";
echo "<select name='variety'>";
echo "<option value='All'>All</option>";
while($row = mysql_fetch_row($output))
{
echo("<option value='$row[1]'> $row[1]</option>");
}
echo "</select>";
echo "</br>";

//year code
$query = "SELECT DISTINCT year FROM wine ORDER BY year";
$output = mysql_query($query, $dbconn);

echo "Select the range of the year";
echo "<select name='start'>";
while($row = mysql_fetch_row($output))
{
echo("<option value='$row[0]'> $row[0]</option>");
}

echo "</select>";
echo " to ";
$query = "SELECT DISTINCT year FROM wine ORDER BY year DESC";
$output = mysql_query($query, $dbconn);
echo "<select name='end'>";
while($row = mysql_fetch_row($output))
{
echo("<option value='$row[0]'> $row[0]</option>");
}

echo "</select>";
echo "<br>";
?>

Enter the minimum number of wines in stock :
<input type="text" name="min_stock" value="" size="8">
<br>
Enter the minimum number of wines ordered : 
<input type="text" name="min_order" value="" size="8">
<br>
Enter the cost range (in dollars) : 
 Min: <input type="text" name="base_price" value="0" size="2">
 Max: <input type="text" name="max_price" value="10000" size="2"> 
<br>
<input type="submit" value="Show">
</form>
</body>
</html>
