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
 
require_once PATH_SWAN_LIB . 'operator/sw_operator_abstract.class.php';

/**
+------------------------------------------------------------------------------
* device操作对象 
+------------------------------------------------------------------------------
* 
* @uses sw_operator_abstract
* @package 
* @version $_SWANBR_VERSION_$
* @copyright $_SWANBR_COPYRIGHT_$
* @author $_SWANBR_AUTHOR_$ 
+------------------------------------------------------------------------------
*/
class sw_operator_rrd_device extends sw_operator_abstract
{
	// {{{ functions
	// {{{ public funcction add_device()

	/**
	 * 添加设备 
	 * 
	 * @param sw_property_rrd_device $property 
	 * @access public
	 * @return void
	 */
	public function add_device(sw_property_rrd_device $property)
	{
		$attributes = $property->attributes();
		$require_fields = array('device_name', 'host',);
		$this->_check_require($attributes, $require_fields);

		$this->__db->insert(SWAN_TBN_DEVICE, $attributes);
	}

	// }}}
	// {{{ public funcction get_device()

	/**
	 * 获取所有的设备信息 
	 * 
	 * @param sw_condition_operator_rrd_device_get_device $condition 
	 * @access public
	 * @return array
	 */
	public function get_device(sw_condition_operator_rrd_device_get_device $condition)
	{
		$condition->check_params();
		$select = $this->__db->select()
						     ->from(SWAN_TBN_DEVICE, null);
		$condition->where($select, true);
		return $this->_get($select, $condition->params());

	}

	// }}}
	// {{{ public funcction mod_device()

	/**
	 * 修改的设备信息 
	 * 
	 * @param sw_condition_operator_rrd_device_mod_device $condition 
	 * @access public
	 * @return array
	 */
	public function mod_device(sw_condition_operator_rrd_device_mod_device $condition)
	{
		$condition->check_params();
		$params = $condition->params();
		$attributes = $condition->get_property()->prepared_attributes();

		$where = $condition->where();
		if (!$where || !$attributes) {
			return;	
		}

		$this->__db->update(SWAN_TBN_DEVICE, $attributes, $where);
	}

	// }}}
	// {{{ public funcction del_device()

	/**
	 * 删除的设备信息 
	 * 
	 * @param sw_condition_operator_rrd_device_del_device $condition 
	 * @access public
	 * @return void
	 */
	public function del_device(sw_condition_operator_rrd_device_del_device $condition)
	{
		$condition->check_params();
		$where = $condition->where();
		if (!$where) {
			return;	
		}

		$this->__db->delete(SWAN_TBN_DEVICE, $where);
	}

	// }}}
	// }}}	
} 
