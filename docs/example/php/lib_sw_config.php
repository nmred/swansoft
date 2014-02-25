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
* Config类example
+------------------------------------------------------------------------------
* 
* @package sw_config
* @version $_SWANBR_VERSION_$
* @copyright $_SWANBR_COPYRIGHT_$
* @author $_SWANBR_AUTHOR_$ 
+------------------------------------------------------------------------------
*/

require_once './core.php';

require_once PATH_SWAN_LIB . 'sw_config.class.php';

/*
+------------------------------------------------------------------
 * {{{ get_config
+------------------------------------------------------------------
*/

$db_info = sw_config::get('db');
print_r($db_info);

/* }}}
+------------------------------------------------------------------
 * {{{
+------------------------------------------------------------------
*/
/* }}}
+------------------------------------------------------------------
 * 
+------------------------------------------------------------------
*/

