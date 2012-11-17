<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4 foldmethod=marker: */
// +---------------------------------------------------------------------------
// | SWAN [ $_SWANBR_SLOGAN_$ ]
// +---------------------------------------------------------------------------
// | Copyright $_SWANBR_COPYRIGHT_$
// +---------------------------------------------------------------------------
// | Version  $_SWANBR_VERSION_$
// +---------------------------------------------------------------------------
// | Licensed ( $_SWANBR_LICENSED_URL_$ )
// +---------------------------------------------------------------------------
// | $_SWANBR_WEB_DOMAIN_$
// +---------------------------------------------------------------------------
 
/**
+------------------------------------------------------------------------------
* Validate类example
+------------------------------------------------------------------------------
* 
* @package sw_validate
* @version $_SWANBR_VERSION_$
* @copyright $_SWANBR_COPYRIGHT_$
* @author $_SWANBR_AUTHOR_$ 
+------------------------------------------------------------------------------
*/

require_once './core.php';

#require_once PATH_SWAN_LIB . 'sw_validate.class.php';

/*
+------------------------------------------------------------------
 * {{{ sw_validate_ip
+------------------------------------------------------------------
*/
require_once PATH_SWAN_LIB . 'sw_validate.class.php';

var_dump(sw_validate::validate_int("22"));
//var_dump(sw_validate::validate_ip("2ww2"));
var_dump(sw_validate::validate_between("4", 2, 56));
var_dump(sw_validate::validate_in_array("4", array(2,4), false, true));
/* }}}
+------------------------------------------------------------------
 * {{{ output_xml 创建一个XML文件
+------------------------------------------------------------------
*/

#$create_xml = sw_xml::factory('output_xml');
#$create_xml->set_filename('output_test.xml');
#var_dump($create_xml->output_xml($arr));
/* }}}
+------------------------------------------------------------------
 * 
+------------------------------------------------------------------
*/


