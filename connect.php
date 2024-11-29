<?
@mysql_connect('', '', '') or die('No connect to SERVER');
mysql_select_db('') or die('No connect to DB');
mysql_query("SET NAMES 'UTF8'") or die('Cant set charset');

$sql_rates = mysql_query("SELECT * FROM `offices` ORDER BY `longitude` ASC;");
$rates = array();
while ($row = mysql_fetch_assoc($sql_rates)) {
    $rates[] = $row;
}


?>
