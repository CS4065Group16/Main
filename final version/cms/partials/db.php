<!--Not in public domain-->
<!--Database connection below used in all PHP files-->
<!--Putting all values in ass array to make it secure-->
<?php
$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "play_it_by_peer_db";
/*Convert into constants*/
foreach($db as $key => $value) {
    //key to upercase
    define(strtoupper($key), $value);
    }
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
?>