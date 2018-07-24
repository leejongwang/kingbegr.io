<?
if (!defined("_WZ_MOBILE_")) exit;

$begin_time = get_microtime();

include_once("$g4[path]/head.sub.php");

$tmp_menu = "";
if (isset($sub_menu)) $tmp_menu = substr($sub_menu, 0, 3); // admin.head.php, admin.tail.php 파일에서 사용.
?>

<script type="text/javascript" src="<?php echo $g4['admin_path']?>/admin.js"></script>
<link rel="stylesheet" href="<?php echo $g4['admin_path']?>/admin.style.css?131115" type="text/css">

<body topmargin="0" leftmargin="0">

	<!-- UI Object -->
	<div id="wrap">
		
		<!-- header -->
		<header id="header" class="d_head">
			<div id="hd_wrap">
				<div class="hpos left">
					<a href="javascript:history.go(-1);"><span style="height:35px;line-height:35px;display:inline-block"><span class="wzicon historyback"></span></span></a>
				</div>
				<div class="hpos"><h3><a href="<?php echo $g4[admin_path]?>">ADMINISTRATOR</a></h3></div>
				<div class="hpos right">
					<span id="category-open" style="height:35px;line-height:35px;display:inline-block"><span class="wzicon category"></span></span>
				</div>
			</div>
		</header>
		<!-- //header -->
		
		<!-- container -->
		<div id="containwrap">
		<div id="container">

			<div style="height:10px;"></div>
			
			<!-- admconer -->
			<div class="admconer">
				
				<?php if ($tmp_menu) {?>
				<div class="navi">
					
					<?php
					function print_menu2($key)
					{
						global $menu, $auth_menu, $is_admin, $auth, $g4, $sub_menu;

						$str = "";
						for($i=1; $i<count($menu[$key]); $i++)
						{
							if ($is_admin != "super" && (!array_key_exists($menu[$key][$i][0],$auth) || !strstr($auth[$menu[$key][$i][0]], "r")))
								continue;

							if ($menu[$key][$i][0] == "-") 
							{ 
								;
							} 
							else // 소메뉴명.
							{
								$selected = "";
								if ($menu[$key][$i][0] == $sub_menu || basename($_SERVER['PHP_SELF']) == basename($menu[$key][$i][2])) $selected = "selected";

								$str .= "<option value='{$menu[$key][$i][2]}' ". $selected .">{$menu[$key][$i][1]}</option>";

								$auth_menu[$menu[$key][$i][0]] = $menu[$key][$i][1];
							}
						}

						if ($str) { 
						    $str = "<select name='' class='select' onchange=\"location.href=this.options[this.selectedIndex].value\">$str</select>";
						} 

						return $str;
					}
					?>

					<?php echo print_menu2("menu{$tmp_menu}"); ?>

				</div>
				<?php } ?>
				
				<!-- cgroup -->
				<div class="cgroup">

				

					