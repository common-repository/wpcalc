<?php if ( ! defined( 'ABSPATH' ) ) exit;
	global $wpdb;
	$data = $wpdb->prefix . "wow_fp";
	$data_mails = $wpdb->prefix . "wow_mails";
	$info = (isset($_REQUEST["info"])) ? $_REQUEST["info"] : '';
	if ($info == "saved") {
		echo "<div class='updated' id='message'><p><strong>".__("Record Added", "wow-fp-lang")."</strong>.</p></div>";
	}
	if ($info == "update") {
		echo "<div class='updated' id='message'><p><strong>".__("Record Updated", "wow-fp-lang")."</strong>.</p></div>";
	}
	if ($info == "del") {
		$delid = $_GET["did"];
		$wpdb->query("delete from " . $data . " where id=" . $delid);
		echo "<div class='updated' id='message'><p><strong>".__("Record Deleted", "wow-fp-lang").".</strong>.</p></div>";
	}
	if ($info == "delmail") {
		$delid = $_GET["did"];
		$wpdb->query("delete from " . $data_mails . " where id=" . $delid);
		echo "<div class='updated' id='message'><p><strong>".__("Record Deleted", "wow-fp-lang").".</strong>.</p></div>";
	}
	$resultat = $wpdb->get_results("SELECT * FROM " . $data . " order by id asc");	
	$count = count($resultat);
?>

<div class="wow">
    <h1><?php esc_attr_e(WOW_FP_NAME, "wow-fp-lang") ?> <a href='https://www.facebook.com/wowaffect/' target="_blank" title="Join us on Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></h1>
	<ul class="wow-admin-menu">
		<li><a href='admin.php?page=<?php echo WOW_FP_BASENAME;?>'><?php esc_attr_e("List", "wow-fp-lang") ?></a></li>
		<li><?php if($count<3){; ?><a href='admin.php?page=<?php echo WOW_FP_BASENAME;?>&tool=add' ><?php esc_attr_e("Add new", "wow-fp-lang") ?></a><?php } ?></li>			
		<li><a href='admin.php?page=<?php echo WOW_FP_BASENAME;?>&tool=faq' ><?php esc_attr_e("FAQ", "wow-fp-lang") ?></a></li>	
		<li><a href='admin.php?page=<?php echo WOW_FP_BASENAME;?>&tool=pro' ><?php esc_attr_e("Pro version", "wow-fp-lang") ?></a></li>
		<li><a href='admin.php?page=<?php echo WOW_FP_BASENAME;?>&tool=items'><b><?php esc_attr_e("Plugins", "wow-fp-lang") ?></b></a></li>
		<li></li>
	</ul>
	
	
	<?php
		$tool= (isset($_REQUEST["tool"])) ? sanitize_text_field($_REQUEST["tool"]) : '';
		if ($tool == "add"){
			include_once( 'add.php');
			return;	
		}
		if ($tool == "" ){
			include_once( 'list.php' );
			return;
		}		
		if ($tool == "license"){
			include_once( 'license.php' );	
			return;
		}
		if ($tool == "items"){
			include_once( 'items.php' );	
			return;
		}
		if ($tool == "faq"){
			include_once( 'faq.php' );	
			return;
		}
		if ($tool == "pro"){
			include_once( 'pro.php' );	
			return;
		}
		
		else {		
			echo '<div class="metabox-holder"><div class="meta-box-sortables"><div class="postbox"><h3><a href="admin.php?page='.WOW_FP_BASENAME.'&tool=license">'.__("Enter the license key to activate the plugin", "wow-fp-lang").'</a></h3></div></div></div>';
		}
	?>
</div>