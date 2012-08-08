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
if (!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW)) {
echo 'Could not connect to mysql on ' . DB_HOST . "\n";
exit;
}
if (!mysql_select_db(DB_NAME, $dbconn)) {
echo 'Could not use database ' . DB_NAME . "\n";
echo mysql_error() . "\n";
exit;
}

//country drop down list

$query = "SELECT *  FROM region";
$output = mysql_query($query, $dbconn);
echo "<select name='region'>";
while($row = mysql_fetch_row($output))
{
echo("<option value='$row[1]'> $row[1]</option>"); 
}
echo "</select>";
echo "</br>";

//variety drop down list

$query = "SELECT *  FROM grape_variety";
$output = mysql_query($query, $dbconn);
echo "Select the grape variety";
echo "<select name='variety'>";
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
 Min: <input type="text" name="base_price" value="" size="2">
 Max: <input type="text" name="max_price" value="" size="2"> 
<br>
<input type="submit" value="Show">
</form>
</body>
</html>
