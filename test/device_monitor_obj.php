<?php
require_once 'core.php';

use \lib\member\sw_member as sw_mem;

// 添加 device monitor
//$device_property_key    = sw_mem::property_factory('device_key', array('device_id' => '1'));
//$device_property_monitor    = sw_mem::property_factory('device_monitor', array('value' => 'data'));
//$monitor_property_basic = sw_mem::property_factory('monitor_basic', array('monitor_id' => '1'));
//$monitor_property_attribute = sw_mem::property_factory('monitor_attribute', array('attr_id' => '1'));
//$device_property_monitor->set_monitor_basic($monitor_property_basic);
//$device_property_monitor->set_monitor_attribute($monitor_property_attribute);
//$device = sw_mem::operator_factory('device', $device_property_key);
//$device_monitor = $device->get_operator('monitor')->add_monitor($device_property_monitor);
//var_dump($device_monitor);

// 获取 device monitor
//$condition = sw_mem::condition_factory('get_device_monitor');
//$condition->set_like('value');
//$condition->set_value('d');
//$device = sw_mem::operator_factory('device');
//$device_monitor = $device->get_operator('monitor')->get_monitor($condition);
//var_dump($device_monitor);

// 修改 device monitor
//$device_property_key = sw_mem::property_factory('device_key', array('device_id' => '1'));
//$device_property_monitor = sw_mem::property_factory('device_monitor', array('value' => 'data222'));
//$monitor_property_basic  = sw_mem::property_factory('monitor_basic', array('monitor_id' => '1'));
//$monitor_property_attribute = sw_mem::property_factory('monitor_attribute', array('attr_id' => '1'));
//$device_property_monitor->set_monitor_basic($monitor_property_basic);
//$device_property_monitor->set_monitor_attribute($monitor_property_attribute);
//$condition = sw_mem::condition_factory('mod_device_monitor');
//$condition->set_property($device_property_monitor);
//$condition->set_in('device_id');
//$condition->set_device_id(1);
//$device = sw_mem::operator_factory('device', $device_property_key);
//$device_monitor = $device->get_operator('monitor')->mod_monitor($condition);

// 删除 device monitor
//$condition = sw_mem::condition_factory('del_device_monitor', array('device_id' => 1));
//$condition->set_in('device_id');
//$device = sw_mem::operator_factory('device');
//$device_monitor = $device->get_operator('monitor')->del_monitor($condition);
