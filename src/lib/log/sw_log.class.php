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
 
namespace lib\log;
use \lib\log\exception\sw_exception;

/**
+------------------------------------------------------------------------------
* 日志模块 
+------------------------------------------------------------------------------
* 
* @package 
* @version $_SWANBR_VERSION_$
* @copyright Copyleft
* @author $_SWANBR_AUTHOR_$ 
+------------------------------------------------------------------------------
*/
class sw_log extends \swan\log\sw_log
{
	// {{{ consts

	const LOG_DEFAULT_ID = 1;

	// }}}
	// {{{ members
	// }}}
	// {{{ functions
	// {{{ public static function L()
	
	/**
	 * log 
	 * 
	 * @static
	 * @access public
	 * @return void
	 */
	public function L($message, $level)
	{
		$options = array('log_id' => self::LOG_DEFAULT_ID);
		$writer = parent::writer_factory('logsvr', $options);
		parent::add_writer($writer);
		parent::log($message, $level);
	}

	// }}}		
	// }}}
}
