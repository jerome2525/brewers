<?php
/*
Plugin Name: Brewers
Description: Custom plugin that fetch data from https://www.openbrewerydb.org/ kindly use this shortcode [brewers] on the home page or any page
Plugin URI: https://www.eigital.com/
Author: Jerome Anyayahan
Author URI: https://www.eigital.com/
Version: 1.0
License: GPL2
Text Domain: brewers
*/

require plugin_dir_path( __FILE__ ) . 'inc/brewers.php';

$Brewers  = new Brewers();



