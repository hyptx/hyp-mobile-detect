<?php
/*
Plugin Name: Hyp Mobile Detect
Plugin URI: http://mobiledetect.myhyperspace.com
Description: Mobile detection for your wordpress site
Author: Adam J Nowak
Version: 1.0
Author URI: http://hyperspatial.com
*/

//File Paths
define('HMD_PLUGIN',WP_PLUGIN_URL . '/' . basename(dirname(__FILE__)) . '/');
define('HMD_PLUGIN_SERVERPATH',dirname(__FILE__) . '/');

require HMD_PLUGIN_SERVERPATH . 'Mobile_Detect.php';

?>