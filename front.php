<?php
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
$tcff_option = tcff_setting_handler();
$fields = '';
$diagnostics = $_GET['tcff_diagnostics'];
unset($_GET['tcff_diagnostics']);
foreach($_GET as $key=>$value){
	if (strpos($key, 'tcff_') !== false && $value != 'undefined') {
		$val = str_replace("_extra", "", str_replace("!!", "#", $value)); 
		if(strpos($val, "|") !== false){
			$options = explode("|", $val);
			$fval = '';
			$tkey = str_replace("tcff_", "", $key);
			foreach($options as $okey=>$ovalue){
					if($ovalue == 'on') $fval .= empty($fval) ? $tcff_option[$tkey][$okey] : ','.$tcff_option[$tkey][$okey];
			}
			$fields .= empty($fval) || $fval == ' ' ? '' : ' '.$tkey.'="'.$fval.'"';
		} else{
			$fields .= empty($val) || $val == ' ' ? '' : ' '.str_replace("tcff_", "", $key).'="'.$val.'"';
		}
	}
}
?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
    <style>
	.cff-wrapper-ctn, #cff .cff-posts-wrap, #cff .cff-masonry-posts {
		height:auto !important;
	}
	</style>
</head>

<body <?php body_class(); ?> style="margin-bottom:50px;">
<?php 
$helper = '<h4>"Admin Diagnostics" setting for this module is ENABLED</h4>
To properly render this divi module:
<div style="padding-left:40px;margin-bottom: 20px;">
  - Open the Divi Builder<br>
  - Edit the "Module Setting" for this Divi module<br>
  - Disable the "Admin Diagnostics" settings<br>
</div>
<h4>Module Shortcode</h4>';
echo ($diagnostics == 'off') ? do_shortcode('[custom-facebook-feed'.$fields.']') : $helper.'[custom-facebook-feed'.$fields.']';
?>
<?php wp_footer(); ?>
</body>