<?php
$sub_menu = "300901";
include_once("./_common.php");

header("Content-Type: text/html; charset=$g4[charset]");

check_demo();

auth_check($auth[$sub_menu], "w");

sql_query(" update {$g4['group_table']} set gr_display = 'N' ");
for($i=0;$i<count($gr_no);$i++) {
	$get_gr_no = $gr_no[$i];
	if (isset($dis_gr_id[$get_gr_no])) { 
	   sql_query(" update {$g4['group_table']} set gr_display = 'Y' where gr_id = '" . trim($dis_gr_id[$get_gr_no]) . "' ");
	} 
	else {
		
	}
}

for($i=0;$i<count($bo_no);$i++) {
	$get_bo_no = $bo_no[$i];
	if (isset($bo_display[$get_bo_no])) { 
		$get_bo_display = "Y";
	} 
	else {
		$get_bo_display = "N";
	}
	$sql = " update {$g4['board_table']} set bo_display = '$get_bo_display', bo_mobile_skin = '".$bo_mobile_skin[$get_bo_no]."' where bo_table = '" . trim($bo_tbl[$get_bo_no]) . "' ";
	//echo $sql."<br />";
	sql_query($sql);    
	
}

$resultYn = "1";
$resultMsg = "¼º°ø";
?>
{"result":"<?=$resultYn?>","resultMsg":"<?=$resultMsg?>"}