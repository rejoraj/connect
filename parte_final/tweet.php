<?php

$consumerKey    = "CSn33NhSmlajJsCw8wvnA"; //'<insert your consumer key';
$consumerSecret = "7X8A4TymjgkTnCc3gfBX2dz8wlXDB1mhDCAeAowMjA";//'<insert your c$
$oAuthToken     = "778974349-9EM3fNuYDHXT0GKGdL0ujV1t1njancXPkPpaD0KP";
$oAuthSecret    = "gftGGeirGMIlyiQ86QIDGC1EqESe5JYJ4SVeZZ2ex0"; //'<insert 
require_once('twitteroauth.php');


$connection = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);


 ?>




