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
 
require_once PATH_SWAN_LIB . 'ui/action/sw_controller_action_web.class.php';

/**
+------------------------------------------------------------------------------
* 管理端管理设备
+------------------------------------------------------------------------------
* 
* @package 
* @version $_SWANBR_VERSION_$
* @copyright $_SWANBR_COPYRIGHT_$
* @author $_SWANBR_AUTHOR_$ 
+------------------------------------------------------------------------------
*/
class sw_controller_admin_device_manage_action extends sw_controller_action_web
{
	// {{{ members
	// }}}
	// {{{ functions
	// {{{ public function action_default()

	/**
	 * action_default 
	 * 
	 * @access public
	 * @return void
	 */
	public function action_default()
	{
		// 获取菜单
		$tpl_param['mode'] = 'add';
		$this->render('device_manage.html', $tpl_param);
	}

	// }}}
	// {{{ public function action_do()

	/**
	 * action_do
	 * 
	 * @access public
	 * @return void
	 */
	public function action_do()
	{
		$action = $this->__request->get_post('action', '');
		switch ($action) {
			case 'add_device_do':
				$this->_add_device_do();
				break;
			default:
				break;	
		}
	}

	// }}}
	// {{{ protected function _add_device_do()

	/**
	 * 添加设备 
	 * 
	 * @access protected
	 * @return void
	 */
	protected function _add_device_do()
	{
		$device_name     = trim($this->__request->get_post('device_name', ''));
		$host			 = trim($this->__request->get_post('host', ''));
		$port			 = trim($this->__request->get_post('port', ''));
		$snmp_version    = trim($this->__request->get_post('snmp_version', ''));
		$security_name   = trim($this->__request->get_post('security_name', ''));
		$security_level  = trim($this->__request->get_post('security_level', ''));
		$auth_protocol   = trim($this->__request->get_post('auth_protocol', ''));
		$auth_passphrase = trim($this->__request->get_post('auth_passphrase', ''));
		$priv_protocol   = trim($this->__request->get_post('priv_protocol', ''));
		$priv_passphrase = trim($this->__request->get_post('priv_passphrase', ''));
		$snmp_community  = trim($this->__request->get_post('snmp_community', ''));
		$snmp_method     = trim($this->__request->get_post('snmp_method', ''));
		$snmp_protocol   = trim($this->__request->get_post('snmp_protocol', ''));
		$snmp_timout     = trim($this->__request->get_post('snmp_timout', ''));
		$snmp_retries    = trim($this->__request->get_post('snmp_retries', ''));

		$device_property = sw_orm::property_factory('rrd', 'device');
		$device_property->set_device_name($device_name);
		$device_property->set_host($host);
		$device_property->set_port($port);
		$device_property->set_snmp_version($snmp_version);
		$device_property->set_snmp_method($snmp_method);
		$device_property->set_snmp_protocol($snmp_protocol);
		$device_property->set_snmp_community($snmp_community);
		$device_property->set_snmp_timeout($snmp_timout);
		$device_property->set_snmp_retries($snmp_retries);
		$device_property->set_security_name($security_name);
		$device_property->set_security_level($security_level);
		$device_property->set_auth_protocol($auth_protocol);
		$device_property->set_auth_passphrase($auth_passphrase);
		$device_property->set_priv_protocol($priv_protocol);
		$device_property->set_priv_passphrase($priv_passphrase);

		try {
			$device_property->check();	
		} catch (sw_exception $e) {
			return $this->json_stdout(array('res' => 1, 'message' => $this->_collect_check_info($device_property, true, '</br>') . $e->getMessage()));	
		}

		try {
			$device_operator = sw_orm::operator_factory('rrd', 'device');	
			$device_operator->add_device($device_property);
		} catch (sw_exception $e) {
			return $this->json_stdout(array('res' => 1, 'message' => $e->getMessage()));	
		}
		
		return $this->json_stdout(array('res' => 0, 'message' => '添加设备成功.'));	
	}

	// }}}
	// }}}
}
