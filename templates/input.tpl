<html>
<head>
<script type="text/javascript">
function validate(myform)
{

if(myform.end.value < myform.start.value)
{
alert("Starting year should be less than ending year");
myform.end.focus();
return false;
}
if(myform.max_price.value < myform.base_price.value)
{
alert("Base price should be less than max price");
myform.max_price.select();
myform.max_price.focus();
return false;
}
}
</script>

</head>
<body>
<br><br>
{if $flag != 1}
<div align="right">
| <a href=session.php>Create Session</a>
 |</div>
<br><br>
{else}
<div align = "right">
| <a href = end_session.php>End Session</a> |
</div>
{/if}
<form action="{$file_name}?action=submit" method="get"  onsubmit="return validate(this)">
<fieldset>
<br><br>
<legend><b><h2> Search:</h2></b> </legend>
Enter  a wine name(or part of the wine name):
<input type="text" name="wine_name" value="{$get.wine_name}">
<br><br>
Enter a winery name(or part of a winery name :
<input type="text" name="winery_name" value="{$get.winery_name|escape}">
<br><br>


Select the region:
<select name='region'>
{foreach from=$region_select item=element}
<option value='{$element[1]}'> {$element[1]}</option>
{/foreach}
</select>
<br><br>

Select the grape variety:
<select name='variety'>
<option value='All'>All</option>
{foreach from=$variety_select item=element}
echo("<option value='{$element[1]}'> {$element[1]}</option>");
{/foreach}
</select>
<br><br>


Select the range of the year:
<select name='start'>
{foreach from=$year_start_select item=element}
<option value='{$element[0]}'> {$element[0]}</option>
{/foreach}
</select>
to
<select name='end'>
{foreach from=$year_end_select item=element}
<option value='{$element[0]}'> {$element[0]}</option>
{/foreach}
</select>
<br><br>

Enter the minimum number of wines in stock :
<input type="text" name="min_stock" value="{$get.min_stock}" size="8">
<br><br>
Enter the minimum number of wines ordered :
<input type="text" name="min_order" value="{$get.min_order}" size="8">
<br><br>
Enter the cost range (in dollars) :
 Min: <input type="text" name="base_price" value="0" size="2">
 Max: <input type="text" name="max_price" value="10000" size="2">
<br><br>
<div align="center">
<br><br>
<input type="submit" value="SEARCH">
</div>
<br><br>
</fieldset>
</form>
</body>
</html>
