<?php
$ATD = $sysconf['admin_template']['dir'].'/'.$sysconf['admin_template']['theme'].'/';

$_style = $_GET['style'];
if($_style){
    $_update = $dbs->query("UPDATE setting SET setting_value='$_style' WHERE setting_name='admin_ms_theme'");
}

$q_color = $dbs->query("SELECT setting_value, setting_name FROM setting WHERE setting_name='admin_ms_theme'");
$d_color = $q_color->fetch_row();
if($d_color[1]!='admin_ms_theme'){
    $theme_color = 'blue';
    $dbs->query("INSERT INTO setting VALUES ('NULL','admin_ms_theme','blue')");
}else{
$theme_color = $d_color[0];
}
?>
<!DOCTYPE html>
<html><head><title><?php echo $page_title; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, post-check=0, pre-check=0" />
<meta http-equiv="Expires" content="Sat, 26 Jul 1997 05:00:00 GMT" />
<link rel="icon" href="<?php echo SWB; ?>webicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo SWB; ?>webicon.ico" type="image/x-icon" />
<link href="<?php echo SWB; ?>template/core.style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $ATD.'reset.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $ATD.'css/style-'.$theme_color.'.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $sysconf['admin_template']['css']; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo JWB; ?>chosen/chosen.css" rel="stylesheet" type="text/css" />
<link href="<?php echo JWB; ?>colorbox/colorbox.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo JWB; ?>jquery.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>updater.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>gui.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>form.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>calendar.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>chosen/ajax-chosen.min.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>tooltipsy.js"></script>
<script type="text/javascript" src="<?php echo JWB; ?>colorbox/jquery.colorbox-min.js"></script>
<?php if ($_SESSION['uid'] == 1) { ?>
<script type="text/javascript" src="<?php echo $ATD; ?>js/custome.js"></script>
<?php } ?>
</head>
<body>
	<div class="loading"></div>
	<div id="log"><span><?php echo $_SESSION['realname']; ?></span><i></i></div>
	<table id="main" cellpadding="0" cellspacing="0">
		<tr>
			<td id="mainLeft">
				<div id="mainMenu">
					<div id="back"><a href="javascript: history.back();"></a></div>
					<?php echo $main_menu; ?>
					<ul>
						<li><div class="divider"></div></li>
						<li>
							<a class="menu about <?php if($_GET['mod'] == 'about'){ echo 'menuCurrent'; }?>" href="index.php?mod=about">About</a>
						</li>
						<li>
							<a class="menu" href="logout.php">LOGOUT</a>
						</li>
					</ul>
				</div>
			</td>
			<?php
			if ($_GET['mod'] == 'about'){ ?>
			<td id="aMainCenter">
				<div class="asubmenu">
					<div class="subMenuHeader">About SLiMS</div>
					<p>SLiMS (Senayan Library Management System) is a free and open source Library Management System.It is build on free and open source technology like PHP and MySQL.</p>
					<p>SLiMS provides many features such as bibliography database, circulation, membership management and many more that will help "automating" library tasks. This project was sponsored by Pusat Informasi dan Humas Kemdikbud and licensed under GPL v3.</p>
					<p>Visit <a href="http://slims.web.id/">slims.web.id</a> for more about SLiMS</p>
				</div>
			</td>
			<td id="aMainRight">
				<div id="mainContent">
					<fieldset class="menuBox">
						<div class="menuBoxInner systemIcon">
							<div class="per_title">
								<h2>Flat SLiMS Template</h2>
							</div>
						</div>
					</fieldset>
					<div class="tInfo">
						<h1>Template Information</h1>
						<div id="tLogo"><span>SLiMS</span><h6>templateMod</h6></div>
						<p>Flat SLiMS template inspired from UI of Microsoft Office 2013</p>
						<p>Contain 7 color theme</p>
						<div id="color_theme">
							<ul>
								<li id="blue"></li>
								<li id="green"></li>
								<li id="indigo"></li>
								<li id="orange"></li>
								<li id="purple"></li>
								<li id="red"></li>
								<li id="green2"></li>
							</ul>
						</div>
						<?php if ($_SESSION['uid'] == 1) { ?>
						<p><small>Click to change color theme</small></p>
						<?php }else{ ?>
						<p><small>Just Admin can change color theme</small></p>
						<?php } ?>
						<h2>Compatibility</h2>
						<p>SLiMS 7 Cendana</p>
						<h2>Related People</h2>
						<p><span>Author</span>Waris Agung Widodo</p>
						<p><span>facebook</span><a href="https://www.facebook.com/mas.ido">Ido Alit</a></p>
						<p><span>e-mail</span><a href="mailto:ido.alit@gmail.com">ido.alit@gmail.com</a></p>
						<p><span>Last Modified By</span>Waris Agung Widodo</p>
						<h2>Related Date</h2>
						<p><span>Created</span>3 July 2013</p>
						<p><span>Last Modified</span>8 July 2013</p>
						<h2>License</h2>
						<p>This software and this template are released under <a href="http://www.gnu.org/licenses/gpl.html">GNU GPL License Version 3</a></p>
					</div>
				</div>
			</td>
			<?php }else{ ?>
			<td id="mainCenter"><div class="submenu"><?php echo $sub_menu; ?></div></td>
			<td id="mainRight"><div id="mainContent"><?php echo $main_content; ?></div></td>
			<?php } ?>
		</tr>
	</table>
	
	<!-- license info -->
	<div id="footer"><?php echo $sysconf['page_footer']; ?></div>
	<!-- license info end -->

	<!-- fake submit iframe for search form, DONT REMOVE THIS! -->
	<iframe name="blindSubmit" style="visibility: hidden; width: 0; height: 0;"></iframe>
	<!-- <iframe name="blindSubmit" style="visibility: visible; width: 100%; height: 300px;"></iframe> -->
	<!-- fake submit iframe -->
</body>
</html>