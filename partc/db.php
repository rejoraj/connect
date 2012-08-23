<?php
define('DB_HOST',   'yallara.cs.rmit.edu.au:12345');
define('DB_PORT', '12345');
define('DB_NAME',   'winestore');
define('DB_USER',   'winestore');
define('DB_PW',     'rejoraj');

if (!$dbconn = mysql_connect(DB_HOST, DB_USER, DB_PW)) {
echo 'Could not connect to mysql on ' . DB_HOST . "\n";
exit;
}

if (!mysql_select_db(DB_NAME, $dbconn)) {
echo 'Could not use database ' . DB_NAME . "\n";
echo mysql_error() . "\n";
exit;
}


?>
