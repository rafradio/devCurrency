<?
//require_once($_SERVER['DOCUMENT_ROOT']."/rus/close/currtest/db.php");
ob_start();
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
ob_end_clean();

global $DB;

//$sql_rates = mysql_query("SELECT * FROM `offices` o 
//						  JOIN `offices_rates` ofr ON o.id=ofr.office_id
//						  WHERE o.is_active = 1 AND o.id <> 19;");

$sql_rates = ("SELECT * FROM `offices` o 
						  JOIN `offices_rates` ofr ON o.id=ofr.office_id
						  WHERE o.is_active = 1 AND o.id <> 19;");

$result = $DB->Query($sql_rates);
$rates = array();
//while ($row = mysql_fetch_assoc($sql_rates)) {
//    $rates[] = $row;
//}

while ($row = $result->Fetch()){
    $rates[] = $row;
}


$sql_rates1 = ("SELECT * FROM `currencies`;");
$result1 = $DB->Query($sql_rates1);

$rates1 = array();
while ($row = $result1->Fetch()) {
    $rates1[] = $row;
}

$out['data'] = $rates;
$out['flags'] = $rates1;
echo json_encode($out, JSON_UNESCAPED_UNICODE);
?>
