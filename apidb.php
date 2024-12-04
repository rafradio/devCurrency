<?
require_once($_SERVER['DOCUMENT_ROOT']."/rus/private/currtest2/db.php");

$sql_rates = mysql_query("SELECT * FROM `offices` o 
						  JOIN `offices_rates` ofr ON o.id=ofr.office_id;");
$rates = array();
while ($row = mysql_fetch_assoc($sql_rates)) {
    $rates[] = $row;
}

$sql_rates1 = mysql_query("SELECT * FROM `currencies`;");
$rates1 = array();
while ($row = mysql_fetch_assoc($sql_rates1)) {
    $rates1[] = $row;
}

$out['data'] = $rates;
$out['flags'] = $rates1;
echo json_encode($out, JSON_UNESCAPED_UNICODE);
?>
