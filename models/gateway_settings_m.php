<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a store module for PyroCMS
 *
 * @author 		pyrocms-store Team - Jaap Jolman - Kevin Meier - Rudolph Arthur Hernandez - Gary Hussey
 * @website		http://www.odin-ict.nl/
 * @package 	pyrocms-store
 * @subpackage 	Store Module
**/
class Gateway_settings_m extends MY_Model {

	public function __construct()
	{		
		parent::__construct();

		/*$this->_table = array(
			'store_config'					=> 'store_config',
			'store_categories'				=> 'store_categories',
			'store_products'				=> 'store_products',
			'store_tags'					=> 'store_tags',
			'store_products_has_store_tags'	=> 'store_products_has_store_tags',
			'store_attributes'				=> 'store_attributes',
			'store_orders'					=> 'store_orders',
			'store_users_adresses'			=> 'store_users_adresses',
			'store_order_adresses'			=> 'store_order_adresses',
			'core_sites'					=> 'core_sites',
			'core_stores'					=> 'core_stores'
		);*/
	}

	public function item($slug)
	{
		$this->db->where('slug',$slug);
		$this->settings = $this->db->get('store_gateway_settings');
		foreach($this->settings->result() as $this->setting)
		{
			return $this->setting->value;
		}
	}
	
	public function set_item($slug,$value)
	{
		$this->setting_data = array(
			'value' => $value
		);
		$this->db->where('slug',$slug);
		$this->db->update('store_gateway_settings',$this->setting_data);
		
	}
	
	public function get_settings()
	{
		$this->db->where('gui','1');
		return $this->db->get('store_gateway_settings');
	}
	
	public function settings_manager_store()
	{
		//print_r($this->input->post()); exit;
		foreach($this->input->post() as $this->post_key => $this->post_value )
		{
			$this->db->where('slug',$this->post_key);
			$this->settings = $this->db->get('store_gateway_settings');
			if($this->settings->num_rows()!=NULL)
			{
				if( $this->post_value == '0')
					$this->set_item($this->post_key,1);
				else
					$this->set_item($this->post_key,$this->post_value);	
			}
		}
		
		if( $this->input->post("paypal_enabled") == "" )
			$this->set_item("paypal_enabled",0);
		
		if( $this->input->post("paypal_developer_mode") == "" )
			$this->set_item("paypal_developer_mode",0);

		if( $this->input->post("paypal_wpp_enabled") == "" )
			$this->set_item("paypal_wpp_enabled",0);

		if( $this->input->post("paypal_wwp_developer_mode") == "" )
			$this->set_item("paypal_wwp_developer_mode",0);
	
	
	}
	
	public function generate_dropdown($slug)
	{
		$this->db->where('slug',$slug);
		$this->items = $this->db->get('store_gateway_settings');
		$this->dropdown = array('Select' => 'Select');
		foreach($this->items->result() as $this->item)
		{
			$this->options = explode('|',$this->item->options);
			foreach($this->options as $this->option)
			{
				$this->temp = explode('=',$this->option);
				$this->dropdown[$this->temp[0]] = $this->temp[1];
			}
		}
		return $this->dropdown;
	}
	
}