<?php
/*
Plugin Name: Hyp Mobile Detect
Plugin URI: https://github.com/hyptx/hyp-mobile-detect
Description: Mobile detection for your wordpress site
Author: Adam J Nowak
Version: 1.0
Author URI: http://hyperspatial.com
*/

/*
//https://github.com/serbanghita/Mobile-Detect#usage
//Usage
$hmd = new HMD();
if( $hmd->device()->isAndroidOS() ) echo 'Android Device';
else echo 'Not Android';
echo '<br /><br />';
if( $hmd->device()->isIOS() ) echo 'IOS Device';
else echo 'Not IOS Device';
echo '<br /><br />';
echo  'deviceType = ' . $hmd->device_type();
*/

//File Paths
define('HMD_PLUGIN',WP_PLUGIN_URL . '/' . basename(dirname(__FILE__)) . '/');
define('HMD_PLUGIN_SERVERPATH',dirname(__FILE__) . '/');

require HMD_PLUGIN_SERVERPATH . 'Mobile_Detect.php';

class HMD{
	private $_device,$_device_type;
	public function __construct(){
		$this->_device = new Mobile_Detect();
		$this->_device_type = ($this->_device->isMobile() ? ($this->_device->isTablet() ? 'tablet' : 'phone') : 'computer');
	}
	public function device(){ return $this->_device; }
	public function device_type(){ return $this->_device_type; }
}
?>
