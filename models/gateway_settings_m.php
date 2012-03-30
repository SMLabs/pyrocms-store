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

	/*public function item($slug)
	{
		$this->db->where('slug',$slug);
		$this->settings = $this->db->get('store_gateway_settings');
		foreach($this->settings->result() as $this->setting)
		{
			return $this->setting->value;
		}
	}
	*/
	
	
	public function get_paypal_settings()
	{
		$this->db->where('store_gateways.gateway_id','1');
		$this->db->from('store_gateways');
		$this->db->join('store_gateway_settings', 'store_gateway_settings.gateway_id = store_gateways.gateway_id');
		$query = $this->db->get();
		return  $query->result();		
	}

	public function get_paypal_wpp_settings()
	{
		$this->db->where('store_gateways.gateway_id','2');
		$this->db->from('store_gateways');
		$this->db->join('store_gateway_settings', 'store_gateway_settings.gateway_id = store_gateways.gateway_id');
		$query = $this->db->get();
		return  $query->result();		
	}

	public function get_authorizenet_settings()
	{
		$this->db->where('store_gateways.gateway_id','3');
		$this->db->from('store_gateways');
		$this->db->join('store_gateway_settings', 'store_gateway_settings.gateway_id = store_gateways.gateway_id');
		$query = $this->db->get();
		return $query->result();		
	}
	
	public function settings_manager_store()
	{
		$is_active= ''; $developer_mode = '';
		
		foreach($this->input->post() as $this->post_key => $this->post_value ):
			if( $this->post_key == 'is_active' || $is_active == 'marked' ):
				$this->db->set('is_active', '1');
				$is_active = 'marked';
			else:
				$this->db->set('is_active', '0');
			endif;
			
			
			if( $this->post_key == 'developer_mode' || $developer_mode == 'marked'):
				$this->db->set('developer_mode', '1');
				$developer_mode = 'marked';
			else:
				$this->db->set('developer_mode', '0');
			endif;		
					
			$this->db->where('gateway_id',$this->input->post('gateway_id'));
			$this->db->update('store_gateways');
				
			$this->set_item($this->post_key,$this->post_value);
			
		endforeach;
	}
	
	public function set_item($slug,$value)
	{
		$this->setting_data = array(
			'value' => $value
		);
		$this->db->where('slug',$slug);
		$this->db->update('store_gateway_settings',$this->setting_data);
		
	}	
	
	/*public function generate_dropdown($slug)
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
	}*/
	
}