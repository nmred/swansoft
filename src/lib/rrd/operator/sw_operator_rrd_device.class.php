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
	// {{{ public function add_device()

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
		$require_fields = array('device_name', 'host', 'device_id');
		$this->_check_require($attributes, $require_fields);
		$this->_check_unique($attributes);

		$this->__db->insert(SWAN_TBN_DEVICE, $attributes);
	}

	// }}}
	// {{{ public function get_device()

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
	// {{{ public function mod_device()

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

		// 排除 device_name
		if (isset($attributes['device_name'])) {
			unset($attributes['device_name']);	
		}

		$where = $condition->where();
		if (!$where || !$attributes) {
			return;	
		}

		$this->__db->update(SWAN_TBN_DEVICE, $attributes, $where);
	}

	// }}}
	// {{{ public function del_device()

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
	// {{{ protected function _check_unique()

	/**
	 * 检查设备名的唯一性 
	 * 
	 * @param mixed $attributes 
	 * @access protected
	 * @return void
	 */
	protected function _check_unique($attributes)
	{
		$parrent = '/^[a-zA-Z]+[0-9a-zA-Z_]{5,}$/is';
		if (!preg_match($parrent, $attributes['device_name'])) {
			require_once PATH_SWAN_LIB . 'operator/sw_operator_exception.class.php';
			throw new sw_operator_exception("设备名的格式必须是首个字符是字母，由数字、字母、下划线组成,并且至少6位");	
		}

		$select = $this->__db->select()
							 ->from(SWAN_TBN_DEVICE, 'count(*)')
							 ->where('device_name = ?', $attributes['device_name']);

		$name_exists = $this->__db->fetch_one($select);

		if ($name_exists) {
			require_once PATH_SWAN_LIB . 'operator/sw_operator_exception.class.php';
			throw new sw_operator_exception($attributes['device_name'] . "设备名已经存在");
		}
	}

	// }}}
	// }}}	
} 
