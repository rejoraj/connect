<?php
/**
 * Define the DB connection details separately so that 
 * they are not publicly available in github. 
 *
 */

/**
 * Hostname and port mysql is running on (can't use localhost)
 */
define('DB_HOST',   'yallara.cs.rmit.edu.au:12345');
/**
 * Name of database to connect to
 */
define('DB_NAME',   'winestore');
/**
 * Username to connect with
 */
define('DB_USER',   'winestore');

/**
 * Password to connect with
 */
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
