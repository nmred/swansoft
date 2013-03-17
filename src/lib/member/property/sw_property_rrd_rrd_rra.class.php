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
 
require_once PATH_SWAN_LIB . 'property/sw_property_adapter_abstract.class.php';

/**
+------------------------------------------------------------------------------
* 归档策略属性对象 
+------------------------------------------------------------------------------
* 
* @uses sw_property_adapter_abstract
* @package 
* @version $_SWANBR_VERSION_$
* @copyright $_SWANBR_COPYRIGHT_$
* @author $_SWANBR_AUTHOR_$ 
+------------------------------------------------------------------------------
*/
class sw_property_rrd_rrd_rra extends sw_property_adapter_abstract
{
	// {{{ members

	/**
	 * 允许设置的元素列表 
	 * 
	 * @var array
	 * @access protected
	 */
	protected $__allow_attributes = array(
		'rra_id'      => true,
		'project_id'  => true,
		'device_id'   => true,
		'rra_cf'  => true,
		'rra_xff' => true,
		'steps'   => true,
		'rows' => true,
	);

	/**
	 * 主键 
	 * 
	 * @var string
	 * @access protected
	 */
	protected $__key_attributes = array('project_id', 'rra_id');

	/**
	 * 整形类型 
	 * 
	 * @var array
	 * @access protected
	 */
	protected $__int_fields = array(
		'steps',
		'rows',
	);

	/**
	 * 枚举类型 
	 * 
	 * @var array
	 * @access protected
	 */
	protected $__int_enum_fields = array(
		'rra_cf'  => array(0, 1, 2, 3),
	);
		
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