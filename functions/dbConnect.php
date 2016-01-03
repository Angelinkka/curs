<?php
$dblocation = "localhost";
$dbname = "theater";
$dbuser = "root";
$dbpasswd = "";

$dbcnx = mysql_connect($dblocation, $dbuser, $dbpasswd);
mysql_query('SET NAMES utf8');
if (!$dbcnx)
{
    die( "<p>server mySQL disabled</p>" );
}
if (!mysql_select_db($dbname,$dbcnx) )
{
    die( "<p>no db</p>" );
}
