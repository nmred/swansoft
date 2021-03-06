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
 
namespace api_test\user\dconfig;
use swan\test\sw_test_db;
use mock\api_test\user\sw_dconfig as sw_mock_dconfig;
use mock\api_test\sw_request;

/**
+------------------------------------------------------------------------------
* 动态分发配置测试 
+------------------------------------------------------------------------------
* 
* @package 
* @version $_SWANBR_VERSION_$
* @copyright $_SWANBR_COPYRIGHT_$
* @group sw_db
+------------------------------------------------------------------------------
*/
class sw_dconfig extends sw_test_db
{
	// {{{ consts
	// }}}
	// {{{ members
	
	/**
	 * 操作对象 
	 * 
	 * @var mixed
	 * @access protected
	 */
	protected $__dconfig = null;

	// }}}
	// {{{ functions
	// {{{ public function get_data_set()
	
	/**
	 * 初始化结果集 
	 * 
	 * @access public
	 * @return void
	 */
	public function get_data_set() 
	{
		return array(
			dirname(__FILE__) . '/_files/prepare.xml',
		);
	}

	// }}}
	// {{{ public function setUp()

	/**
	 * setUp 
	 * 
	 * @access public
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();
		$this->__dconfig = sw_mock_dconfig::get_instance($this);
		$this->__dconfig->init();
	}

	// }}}
	// {{{ public function test_action_smond()
	
	/**
	 * test_action_smond 
	 * 
	 * @access public
	 * @return void
	 */
	public function test_action_smond()
	{
		$post_data = array(
			'device_name' => 'lan-114, lan-115',
		);	

		// 初始化 POST 参数
		sw_request::get_instance($post_data);
		$result = $this->__dconfig->action_smond();	
		$expect = 10000; 
		$this->assertEquals($expect, $result['code']);
		$expect = include(dirname(__FILE__) . '/_files/smond_result.php');
		$this->assertEquals($result['data'], $expect);
	}

	// }}}
	// {{{ public function test_action_monitor()
	
	/**
	 * test_action_monitor 
	 * 
	 * @access public
	 * @return void
	 */
	public function test_action_monitor()
	{
		$post_data = array();	

		// 初始化 POST 参数
		sw_request::get_instance($post_data);
		$result = $this->__dconfig->action_monitor();	
		$expect = 10000; 
		$this->assertEquals($expect, $result['code']);
		$expect = include(dirname(__FILE__) . '/_files/monitor_result.php');
		$this->assertEquals($result['data'], $expect);
	}

	// }}}
	// {{{ public function test_action_madapter()
	
	/**
	 * test_action_madapter 
	 * 
	 * @access public
	 * @return void
	 */
	public function test_action_madapter()
	{
		$post_data = array();	

		// 初始化 POST 参数
		sw_request::get_instance($post_data);
		$result = $this->__dconfig->action_madapter();	
		$expect = 10000; 
		$this->assertEquals($expect, $result['code']);
		$expect = include(dirname(__FILE__) . '/_files/madapter_result.php');
		$this->assertEquals($result['data'], $expect);
	}

	// }}}
	// }}}
}
