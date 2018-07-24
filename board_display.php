<?php
$sub_menu = "300901";
include_once("./_common.php");

if ($is_admin != "super")
    alert("최고관리자만 접근 가능합니다.");

$g4['title'] = "게시판 노출 설정";
include_once ("./admin.head.php");
?>
	
	<form method="post" name="frm" id="frm">
	<div class="tips">
		<p>사용하실 그룹 또는 게시판에 체크해주세요.</p>
	</div>
	<?php

	$sql = " select gr_id, gr_subject, gr_display from {$g4['group_table']} ";
	$res = mysql_query($sql);
	while($row = mysql_fetch_array($res)) { 
		$arrca[] = $row; 
	}
	mysql_free_result($res);
	$cntca = count($arrca);

	$marr = get_mobile_skin_dir("board"); // 모바일 스킨 디렉토리 정보.

	$j=0;
	if ($cntca > 0) { 
		for ($i=0;$i<$cntca;$i++) { 
			$grchecked = "";
			if ($arrca[$i]['gr_display'] == "Y") { 
				$grchecked = "checked";
			} 
			?>
			
			<div class="sectionbx bdset">
				<input type="hidden" name="gr_no[]" value="<?php echo $i;?>" />
				<h2 class="hx"><input type="checkbox" name="dis_gr_id[<?php echo $i;?>]" id="gr_id_<?php echo $i;?>" value="<?php echo $arrca[$i]['gr_id'];?>" class="checkbox" <?php echo $grchecked;?> /> <label for="gr_id_<?php echo $i;?>"><?php echo $arrca[$i]['gr_subject'];?></label></h2>		
				<div class="tx">
					<ul class="sqlist">
						<?php
						$sql = " select bo_table, bo_subject, bo_display, bo_mobile_skin from {$g4['board_table']} where gr_id = '". $arrca[$i]['gr_id'] ."' ";
						$res = sql_query($sql);
						if (mysql_num_rows($res)) { 
							
							while($row = sql_fetch_array($res)) { 
								
								$grchecked = "";
								if ($row['bo_display'] == "Y") { 
									$grchecked = "checked";
								} 
								?>
									<li>
										<input type="hidden" name="bo_no[]" value="<?php echo $j;?>" />
										<input type="hidden" name="bo_tbl[<?php echo $j;?>]" value="<?php echo $row[bo_table];?>" />
										<input type="checkbox" name="bo_display[<?php echo $j;?>]" id="bo_display_<?php echo $j;?>" value="Y" class="checkbox" <?php echo $grchecked;?> /> <label for="bo_display_<?php echo $j;?>"><span class="dliselect"><?php echo $row["bo_subject"]?></span></label>&nbsp;
										<select name="bo_mobile_skin[<?php echo $j;?>]" required itemname="모바일 스킨 디렉토리">
										<?
										for ($z=0; $z<count($marr); $z++) {
											$selected = "";
											if ($marr[$z] == $row['bo_mobile_skin']) $selected = "selected";
											echo "<option value='$marr[$z]' $selected>$marr[$z]</option>\n";
										}
										?></select>
										</li>
								<?php
								$j++;
							}
						}
						?>
					</ul><!-- /.sqlist -->	
				</div>
			</div>
			<div style="height:10px;"></div>

			<?php			
		} 
	}
	?>	
	
	<div class="wz_btn_wide">
		<div class="wz_btn_wide_box" style="width:100%;"><button type="button" id="btn_submit" onclick="getAction();"><span>적용하기</span></button></div>
	</div>

	</form>
		
	<script type="text/javascript">
	<!--
		function getAction() {

			dataString = $("#frm").serialize();
			$.ajax({
				type : "POST" ,
				async : true ,
				url : "board_display_update.php" ,
				dataType : "json" , 
				timeout : 30000 ,
				cache : false ,
				data: dataString ,	
				contentType: "application/x-www-form-urlencoded; charset=<?php echo $g4[charset]?>" ,
				error : function(request, status, error) {
					alert("데모상태로 인한 사용불가 또는 오류 입니다.");
				} ,
				success : function(req) {
					var jsonData = req;
					if (jsonData.result == 1) {
						alert("적용이 완료되었습니다.");
					}
					else {
						alert("오류로 인해 적용되지 않았습니다.");
					}
				}
			});
		}
	//-->
	</script>


<?php
include_once("./admin.tail.php");
?>

