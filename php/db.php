<?php
$db_connection = mysql_connect("database", getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"));

if(!$db_connection){
    die(mysql_error());
}

$db_select = mysql_select_db(getenv("MYSQL_DATABASE"));

if(!$db_select){
    die(mysql_error());
}

