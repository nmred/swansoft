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

namespace lib\member\operator\monitor;
use \lib\member\operator\monitor\exception\sw_exception;

/**
+------------------------------------------------------------------------------
* 监控器 metric 
+------------------------------------------------------------------------------
* 
* @abstract
* @package 
* @version $_SWANBR_VERSION_$
* @copyright $_SWANBR_COPYRIGHT_$
* @author $_SWANBR_AUTHOR_$ 
+------------------------------------------------------------------------------
*/
class sw_metric extends sw_abstract
{
	// {{{ members
	// }}}
	// {{{ functions
	// {{{ public function add_metric()

	/**
	 * 添加监控器 metric 
	 * 
	 * @access public
	 * @return void
	 */
	public function add_metric(\lib\member\property\sw_monitor_metric $property)
	{
		$property_basic = $this->get_monitor_operator()->get_monitor_basic_property();
		$attributes = $property_basic->attributes();
		if (!isset($attributes['monitor_id'])) {
			throw new sw_exception("unknow monitor id.");	
		}

		$monitor_id = $attributes['monitor_id'];
		$attributes = $property->attributes();
		$this->_validate($monitor_id, $attributes['metric_name']);

		if (!isset($attributes['metric_id'])) {
			$metric_id = \lib\sequence\sw_sequence::get_next_monitor($monitor_id, SWAN_TBN_MONITOR_METRIC);	
		} else {
			$metric_id = $attributes['metric_id'];		
		}

		$property->set_metric_id($metric_id);
		$property->set_metric_name($attributes['metric_name']);
		$property->set_monitor_id($monitor_id);
		$attributes = $property->attributes();
		$require_fields = array('metric_id', 'monitor_id', 'metric_name', 'collect_every', 'time_threshold');

		$this->_check_require($attributes, $require_fields);

        $this->__db->insert(SWAN_TBN_MONITOR_METRIC, $attributes);

		return $metric_id;
	}
	
	// }}}
	// {{{ public function get_attribute()

	/**
	 * get_attribute 
	 * 
	 * @param \lib\member\condition\sw_get_monitor_attribute $condition 
	 * @access public
	 * @return void
	 */
	public function get_attribute(\lib\member\condition\sw_get_monitor_attribute $condition)
	{
		$condition->check_params();
		$select = $this->__db->select()
							 ->from(SWAN_TBN_MONITOR_ATTRIBUTE, null);
		$condition->where($select, true);
		return $this->_get($select, $condition->params());	
	}

	// }}}
	// {{{ public function mod_attribute()

	/**
	 * mod_attribute 
	 * 
	 * @param \lib\member\condition\sw_mod_monitor_attribute $condition 
	 * @access public
	 * @return void
	 */
	public function mod_attribute(\lib\member\condition\sw_mod_monitor_attribute $condition)
	{
		$condition->check_params();
		$params = $condition->params();
		$attributes = $condition->get_property()->prepared_attributes();

		$where = $condition->where();
		if (!$where || !$attributes) {
			return; 
		}

		$this->__db->update(SWAN_TBN_MONITOR_ATTRIBUTE, $attributes, $where);
	}

	// }}}
	// {{{ public function del_attribute()

	/**
	 * 删除 monitor 属性 
	 * 
	 * @param \lib\member\condition\sw_del_monitor_attribute $condition 
	 * @access public
	 * @return void
	 */
	public function del_attribute(\lib\member\condition\sw_del_monitor_attribute $condition)
	{
		$condition->check_params();
		$where = $condition->where();
		if (!$where) {
			return; 
		}

		$this->__db->delete(SWAN_TBN_MONITOR_ATTRIBUTE, $where);
	}

	// }}}
	// {{{ public function add_monitor_handler()

	/**
	 * 添加监控器的处理器 
	 * 
	 * @param \lib\member\property\sw_monitor_key $property 
	 * @abstract
	 * @access public
	 * @return void
	 */
	public function add_monitor_handler($property = null)
	{

	}

	// }}}
	// {{{ public function mod_monitor_handler()

	/**
	 * 修改监控器的处理器 
	 * 
	 * @param \lib\member\property\sw_monitor_key $property 
	 * @abstract
	 * @access public
	 * @return void
	 */
	public function mod_monitor_handler($property = null)
	{
		
	}

	// }}}
	// {{{ public function del_monitor_handler()

	/**
	 * 删除监控器的处理器 
	 * 
	 * @param \lib\member\property\sw_monitor_key $property 
	 * @abstract
	 * @access public
	 * @return void
	 */
	public function del_monitor_handler($property = null)
	{
		
	}

	// }}}
	// {{{ protected function _validate()

	/**
	 * _validate 
	 * 
	 * @param mixed $metric_name 
	 * @param int $monitor_id 
	 * @access protected
	 * @return void
	 */
	protected function _validate($monitor_id, $metric_name)
	{
		$parrent = '/^[a-zA-Z]+[0-9a-zA-Z_]{5,}$/is';
		if (!preg_match($parrent, $metric_name)) {
			throw new sw_exception("监控器数据项的格式必须是首个字符是字母，由数字、字母、下划线组成,并且至少6位");  
		}

		$is_exists = $this->__db->fetch_one($this->__db->select()
								->from(SWAN_TBN_MONITOR_BASIC, array('monitor_id'))
								->where('monitor_id= ?'), $monitor_id);

		if (!$is_exists) {
			throw new sw_exception("`$monitor_id` monitor id not  exists.");
		}

		$is_exists = $this->__db->fetch_one($this->__db->select()
								->from(SWAN_TBN_MONITOR_METRIC, array('metric_id'))
								->where('metric_name= ?'), $metric_name);

		if ($is_exists) {
			throw new sw_exception("`$metric_name` monitor metric name already  exists.");
		}
	}

	// }}}
	// }}}
}
