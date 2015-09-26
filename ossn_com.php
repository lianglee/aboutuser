<?php
/**
 * Open Source Social Network
 *
 * @packageOpen Source Social Network
 * @author    Open Social Website Core Team <info@informatikon.com>
 * @copyright 2014 iNFORMATIKON TECHNOLOGIES
 * @license   General Public Licence http://www.opensource-socialnetwork.org/licence
 * @link      http://www.opensource-socialnetwork.org/licence
 */
define('__ABOUTUSER__', ossn_route()->com . 'aboutuser/');
/**
 * Initialize component
 *
 * @return void
 */
function about_user() {
		ossn_profile_subpage('about');
		
		ossn_register_callback('page', 'load:profile', 'profile_about_user');
		ossn_add_hook('profile', 'subpage', 'profile_about_user_page');
		
		ossn_extend_view('css/ossn.default', 'css/aboutuser');
}

/**
 * Regisrer a about user menu
 *
 * @return void
 */
function profile_about_user() {
		$owner = ossn_user_by_guid(ossn_get_page_owner_guid());
		$url   = ossn_site_url();
		ossn_register_menu_link('aboutuser', 'aboutuser', $owner->profileURL('/about'), 'user_timeline');
}
/**
 * Register user about page
 *
 * @return string
 */
function profile_about_user_page($hook, $type, $return, $params) {
		$page = $params['subpage'];
		if($page == 'about') {
				$content = ossn_plugin_view('profile/about', $params);
				echo ossn_set_page_layout('module', array(
						'title' => ossn_print('aboutuser'),
						'content' => $content
				));
		}
}
/**
 * Fund a user age from its brithdate
 * 
 * @param string $birthday User birthdate
 *
 * @return integer
 */
function about_user_age($birthday = '') {
		//you can find your area timezone format here: http://php.net/manual/en/timezones.php
		date_default_timezone_set("Europe/Berlin");
		if(empty($birthday)) {
				return false;
		}
		$birthday = str_replace('/', '-', $birthday);
		$dob      = strtotime($birthday);
		if($dob === false) {
				return false;
		}
		$age = 0;
		
		while(time() > $dob = strtotime('+1 year', $dob)) {
				++$age;
		}
		return $age;
}
ossn_register_callback('ossn', 'init', 'about_user');
