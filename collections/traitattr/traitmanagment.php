<?php
include_once('../../config/symbini.php');
include_once($SERVER_ROOT.'/classes/OccurrenceAttributes.php');
header("Content-Type: text/html; charset=".$CHARSET);

if(!$SYMB_UID) header('Location: '.$CLIENT_ROOT.'/profile/index.php?refurl=../collections/editor/extras/attributemining.php?'.htmlspecialchars($_SERVER['QUERY_STRING'], ENT_QUOTES));

$collid = $_REQUEST['collid'];
$submitForm = array_key_exists('submitform',$_POST)?$_POST['submitform']:'';
$attrID = array_key_exists('attrid',$_POST)?$_POST['attrid']:'';

//Sanitation
if(!is_numeric($collid)) $collid = 0;
if(!is_numeric($attrID)) $attrID = '';

$isEditor = 0;
if($SYMB_UID){
	if($IS_ADMIN){
		$isEditor = 1;
	}
	elseif($collid){
		//If a page related to collections, one maight want to...
		if(array_key_exists("CollAdmin",$USER_RIGHTS) && in_array($collid,$USER_RIGHTS["CollAdmin"])){
			$isEditor = 1;
		}
		elseif(array_key_exists("CollEditor",$USER_RIGHTS) && in_array($collid,$USER_RIGHTS["CollEditor"])){
			$isEditor = 1;
		}
	}
}

$attrManager = new OccurrenceAttributes();

$statusStr = '';
if($isEditor){
	if($submitForm == ''){

	}
}

?>
<html>
	<head>
		<title>Occurrence Attribute Mining Tool</title>
		<?php
		include_once($SERVER_ROOT.'/includes/head.php');
		?>
		<script src="../../js/jquery.js" type="text/javascript"></script>
		<script src="../../js/jquery-ui.js" type="text/javascript"></script>
		<link href="<?php echo $CLIENT_ROOT; ?>/css/v202209/jquery-ui.css" type="text/css" rel="stylesheet">
		<script type="text/javascript">

		</script>
		<script src="../../js/symb/shared.js?ver=151229" type="text/javascript"></script>
	</head>
	<body style="width:900px">
		<?php
		$displayLeftMenu = false;
		include($SERVER_ROOT.'/includes/header.php');
		?>
		<div class="navpath">
			<a href="../../index.php">Home</a> &gt;&gt;
			<a href="../misc/collprofiles.php?collid=<?php echo $collid; ?>&emode=1">Collection Management</a> &gt;&gt;
			<b>Attribute Mining Tool</b>
		</div>
		<?php
		if($statusStr){
			echo '<div style="color:red">';
			echo $statusStr;
			echo '</div>';
		}
		?>
		<!-- This is inner text! -->
		<div id="innertext">

		</div>
	</body>
</html>