<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Code Igniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		Rick Ellis
 * @copyright	Copyright (c) 2006, pMachine, Inc.
 * @license		http://www.codeignitor.com/user_guide/license.html
 * @link		http://www.codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Code Igniter XML Helpers
 *
 * @package		CodeIgniter
 * @subpackage	Helpers
 * @category	Helpers
 * @author		Rick Ellis
 * @link		http://www.codeigniter.com/user_guide/helpers/xml_helper.html
 */

// ------------------------------------------------------------------------

/**
 * Convert Reserved XML characters to Entities
 *
 * @access	public
 * @param	string
 * @return	string
 */	
function xml_convert($str)
{
	$temp = '__TEMP_AMPERSANDS__';

	// Replace entities to temporary markers so that 
	// ampersands won't get messed up
	$str = preg_replace("/&#(\d+);/", "$temp\\1;", $str);
	$str = preg_replace("/&(\w+);/",  "$temp\\1;", $str);
	
	$str = str_replace(array("&","<",">","\"", "'", "-"),
					   array("&amp;", "&lt;", "&gt;", "&quot;", "&#39;", "&#45;"),
					   $str);

	// Decode the temp markers back to entities		
	$str = preg_replace("/$temp(\d+);/","&#\\1;",$str);
	$str = preg_replace("/$temp(\w+);/","&\\1;", $str);
		
	return $str;
}


?>