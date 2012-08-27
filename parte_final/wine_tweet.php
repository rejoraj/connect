<?php
session_start();

include 'tweet.php';  // the file where the tweet instance is created
$str[] = $_SESSION['arr'];


$val = count($str,COUNT_RECURSIVE);

//echo $val . "<br>";




function myfunction($v1,$v2)
{
return $v1 . " " . $v2;
}
$list = array_reduce($_SESSION['arr'],"myfunction");


do
{
$val = substr($list,0,139);
$list = substr($list,139,strlen($list));
//echo $val . "<br>" .  strlen($list) . "<br>";
$text = $connection->post('statuses/update', array('status' =>  $val));
}while(strlen($list) > 1);

echo "The list has been tweeted";


header( "refresh:1;url=index.php" );

?>
