<?php
/*
Plugin Name: Miramont App Banner
Plugin URI: http://mobiledetect.myhyperspace.com
Description: Mobile detection for your wordpress site
Author: Adam J Nowak
Version: 1.0
Author URI: http://hyperspatial.com
*/

/*
//Usage

Add this to a custom page template:

/* Template Name: App Banner */

/*
get_header('app-banner')

Add this in a header template file above the header:

hypab_init()

//Links
https://linkmaker.itunes.apple.com/us/
<a href="market://details?id=com.app_miramont.layout">Download Android App</a>
<a href="https://itunes.apple.com/us/app/miramont/id646462540?mt=8&uo=4" target="itunes_store">Download iPhone/iPad App</a>
*/

session_start();

function hypab_init(){
	if($_GET['hmd_dismiss']){
		$_SESSION['hmd_dismiss'] = 1;
		return; //Clicked Dismiss
	}
	if($_SESSION['hmd_dismiss'] == 1) return; //Still session that has been dismissed
	$hmd = new HMD();
	if($hmd->device()->isAndroidOS()) $device = 'android';
	elseif($hmd->device()->isIOS()) $device = 'ios';
	if(!$device) return; //On a computer or unsupported device
	
	//The Banner
	$message = '<strong> Try out our great free mobile app!</strong>';
	$android_link = '<a href="market://details?id=com.app_miramont.layout">Download Android App</a>';
	$ios_link = '<a href="https://itunes.apple.com/us/app/miramont/id646462540?mt=8&uo=4" target="itunes_store">Download iPhone/iPad App</a>';
	$dismiss_link = '<a href="?hmd_dismiss=1">X</a>';
	?>
	<div id="hmd">
		<div id="hmd-inner">
			<?php
			if($device == 'android') echo $android_link;
			elseif($device == 'ios') echo $ios_link;
			//else echo $android_link; //Test Android
			//else echo $ios_link; //Test IOS
			echo $dismiss_link . $message;
			?>	
		</div><!--/#hmd -->
	</div>
	<?php
}

//Enqueue Styles
function hypab_add_stylesheet(){ wp_enqueue_style('hypab_styles', WP_PLUGIN_URL . '/hyp-miramont-app-banner/style.css'); }
add_action('wp_print_styles', 'hypab_add_stylesheet');

?>