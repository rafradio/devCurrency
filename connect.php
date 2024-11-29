<?
require_once($_SERVER['DOCUMENT_ROOT']."/rus/private/currtest2/db.php");

$sql_rates = mysql_query("SELECT * FROM `offices`
						  JOIN `rates` ON offices.id=rates.office_id;");
$rates = array();
while ($row = mysql_fetch_assoc($sql_rates)) {
    $rates[] = $row;
}
$out['data'] = $rates;
echo json_encode($out, JSON_UNESCAPED_UNICODE);
?>
