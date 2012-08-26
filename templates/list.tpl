<html>
<head>
</head>
<body>
<br><br>
<div align="right">
| <a href=smarty.php>Results</a> |
<a href=index.php>Search</a> |
<a href=wine_tweet.php>Tweet Wine List </a> |
</div>
<br><br>

Wine list is 
<br>
{foreach from=$list_of_wine item=element}
{$element}
<br>
{/foreach}

</body>
</html>

