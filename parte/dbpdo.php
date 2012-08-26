<?php
define('DB_HOST',   'yallara.cs.rmit.edu.au');
define('DB_PORT', '12345');
define('DB_NAME',   'winestore');
define('DB_USER',   'winestore');
define('DB_PW',     'rejoraj');



try {
$db = new PDO(
"mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME,
DB_USER,
DB_PW
);
} catch(PDOException $e) {
echo $e->getMessage();
}

?>
