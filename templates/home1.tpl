<html>
<body>
<br><br>
{if $flag == "1"}
<div align="right">
| <a href=end_session.php> End Session </a>
| <a href=list_of_wines.php>List All Wines</a> 
| <a href=wine_tweet.php>Tweet Wine List</a> | 
| <a href =index.php> Search </a> |
</div>
</br>
{/if}
<br><br>
{if $rowsFound > 0}
Wines of {$region}
<table border = "1">
<tr>
<th>Wine Name </th>
<th> Variety </th>
<th> Year</th>
<th>Winery</th>
<th>Region</th>
<th> Cost </th>
<th> &nbsp;&nbsp;Quantity </th>
<th>Stock Sold</th>
<th>Sales</th>
<tr>
{foreach from=$row item=element}
<pre>
<tr>
	<td> {$element[0]} </td>
	<td> &nbsp;&nbsp; {$element[1]} </td>
	<td>  &nbsp;&nbsp; {$element[2]} &nbsp;&nbsp; </td>
       	<td> 
	&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp; 
	{$element[3]} &nbsp;&nbsp; </td> 
	<td> 
	 &nbsp;&nbsp;&nbsp;
	{$element[4]} &nbsp;&nbsp; </td>
	<td>&nbsp;&nbsp; {$element[5]} &nbsp;&nbsp;</td>
	<td> 
	 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	{$element[6]} &nbsp;&nbsp; </td>
	<td> 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	{$element[7]}
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	</td>
	<td> 
	&nbsp;&nbsp; {$element[8]} &nbsp;&nbsp; </td>
</tr>
</pre>
{/foreach}
{else}
No items match your search criteria
{/if}
</table>
{$rowsFound}

</body></html>

