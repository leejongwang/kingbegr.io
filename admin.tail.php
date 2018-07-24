<?
if (!defined("_WZ_MOBILE_")) exit;
?>
			
				</div>
				<!-- //cgroup -->

			</div>
			<!-- //admconer -->

		</div>
		</div>
		<!-- //container -->

		<!-- footer -->
		<div id="footer">
			<footer>
			<p class="finfo">
				<?php if (!$is_member) { ?>
				    <a href="<?php echo $g4[bbs_path]; ?>/login.php?url=<?php echo urlencode($_SERVER[REQUEST_URI]); ?>" class="wz_btn_mid_gray">로그인</a>
				<?php } else { ?>
					<a href="<?php echo $g4[bbs_path]; ?>/logout.php" class="wz_btn_mid_gray">로그아웃</a>
				<?php } ?>
				
				<?php if ($is_admin) {?>
					<a href="<?php echo $g4[url]; ?>/" class="wz_btn_mid_gray">홈으로</a>
				<?php } ?>

				<a href="<?php echo str_replace(MOBILE_DIR."/", "", $g4[url]."/"); ?>/?vtype=pc" class="wz_btn_mid_gray">PC버전</a>
			</p>
			<p style="margin: 8px 0 5px;">
				<a href="<?php echo $g4[url]?>" class="folinker">&copy; <?php echo $config['cf_title']; ?></a>
			</p>
			</footer>
		</div>
		<!-- //footer -->

	</div>
	<!-- //UI Object -->

	<a style="z-index:3;display:scroll;position:fixed;bottom:8px;right:10px;" onclick="go_top();" title="top"><img src="<?=$g4[path]?>/img/top.png" border=0 style="cursor:pointer" /></a>

	<!-- category layer S -->
	<div id="sviewer" class="sviewer"></div>
	<div class="slidelm">
		
		<div class="wz_btn_wide" style="margin:4px;">
			<div class="wz_btn_wide_box" style="width:100%;"><button type="button" id="category-close"><span>닫 기</span></button></div>
		</div>
		
		<div class="cateist">
		<ul>
			<li><a href="<?php echo $g4['admin_path']; ?>"><span>관리자홈</span></a></li>
			<?php
			foreach($amenu as $key=>$value) {
				$href1 = $href2 = "";
				if ($menu["menu{$key}"][0][2]) {
					$href1 = "<a href='".$menu["menu{$key}"][0][2]."'>";
				}
				else {
					$href1 = "<a href='#'>";
				}

				$classOn = "";
				if ($tmp_menu == substr($menu["menu{$key}"][0][0],0,3)) $classOn = "active";
				echo "<li class='$classOn'>". $href1 . $menu["menu{$key}"][0][1] . $href2 ."</a></li>";
			}
			?>
		</ul>
		</div>

		<div style="height:10px;"></div>

		<div class="wz_btn_wide" style="margin:4px;">
			<div class="wz_btn_wide_box" style="width:50%;"><button type="button" onclick="location.href='<?php echo $g4[url]; ?>'"><span>홈으로</span></button></div>
			<div class="wz_btn_wide_box" style="width:50%;"><button type="button" onclick="location.href='<?php echo $g4[bbs_path]; ?>/logout.php'"><span>로그아웃</span></button></div>
		</div>

		<div style="height:5px;"></div>

		<div style="text-align:center;"><a href="<?php echo $g4[url]?>" class="folinker">&copy; <?php echo $config['cf_title']; ?></a></div>

	</div>
	<!-- category layer E -->

</body>
</html>

<!-- <p>실행시간 : <?=get_microtime() - $begin_time;?> -->

<? 
include_once("$g4[path]/tail.sub.php");
?>