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

*/

function hypab_init(){
	$hmd = new HMD();
	echo '<div id="hmd">';
	
	if( $hmd->device()->isAndroidOS() ) echo 'Android Device - <a href="market://details?id=com.app_miramont.layout">Download Android App</a>  |  ';
	else echo 'Not Android  |  ';
	if( $hmd->device()->isIOS() ) echo 'IOS Device  |  ';
	else echo 'Not IOS Device  |  ';
	echo  'deviceType = ' . $hmd->device_type();
	
	echo '</div>';
}

?>