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
 
namespace lib\member\property;
use \lib\member\property\exception\sw_exception;

/**
+------------------------------------------------------------------------------
* 监控适配器数据项 
+------------------------------------------------------------------------------
* 
* @uses sw_abstract
* @package 
* @version $_SWANBR_VERSION_$
* @copyright $_SWANBR_COPYRIGHT_$
* @author $_SWANBR_AUTHOR_$ 
+------------------------------------------------------------------------------
*/
class sw_madapter_metric extends sw_abstract
{
	// {{{ members

	/**
	 * 允许设置的元素列表 
	 * 
	 * @var array
	 * @access protected
	 */
	protected $__allow_attributes = array(
		'metric_id'      => true,
		'metric_name'    => true,
		'madapter_id'     => true,
		'collect_every'  => true,
		'time_threshold' => true,
		'title'          => true,
		'unit'           => true,
		'tmax'           => true,
		'dst_type'       => true,
		'vmin'           => true,
		'vmax'           => true,
	);

	/**
	 * 主键 
	 * 
	 * @var string
	 * @access protected
	 */
	protected $__key_attributes = array('metric_id', 'madapter_id');

	// }}}		
	// {{{ functions
	// {{{ public function check()

	/**
	 * 检查参数 
	 * 
	 * @access public
	 * @return void
	 */
	public function check()
	{
		parent::check();
	}

	// }}}
	// }}}
}
