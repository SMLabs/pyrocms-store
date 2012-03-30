<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a store module for PyroCMS
 *
 * @author 		pyrocms-store Team - Jaap Jolman - Kevin Meier - Rudolph Arthur Hernandez - Gary Hussey
 * @website		http://www.odin-ict.nl/
 * @package 	pyrocms-store
 * @subpackage 	Store Module
**/
class Admin_payment_gateways extends Admin_Controller
{
	protected $section			= 'payment_gateways';
	protected $upload_config;
	protected $upload_path		= 'uploads/store/payment_gateways/';

	public function __construct()
	{
		parent::__construct();

		///$this->load->model('attributes_m');
		////$this->load->model('products_m');
		//$this->load->model('images_m');
		$this->load->model('gateway_settings_m');
		$this->load->library('form_validation');
		//$this->load->library('store_settings');  //AUTO LOADED
		//$this->load->helper('date');   //AUTO LOADED

		//$this->load->language('general');   //AUTO LOADED
		//$this->load->language('settings');  //AUTO LOADED
		
		$this->load->language('dashboard');
		$this->load->language('statistics');
		$this->load->language('categories');
		$this->load->language('products');
		$this->load->language('orders');
    	$this->load->language('auctions');
		$this->load->language('tags');
		$this->load->language('attributes');
		$this->load->language('attributes_categories');
		$this->load->language('payment_gateways');

		
		/*$this->validation_rules = array(
			array(
				'field' => 'paypal_account',
				'label' => lang('store:payment_gateways:label:paypal_account'),
				'rules' => 'trim|max_length[255]|required'
			),
			array(
				'field' => 'paypal_api_key',
				'label' => lang('store:payment_gateways:label:paypal_api_key'),
				'rules' => 'trim|max_length[255]|required'
			)
		);*/
		
		$this->template
			 ->set_partial('shortcuts', 'admin/partials/shortcuts')
			 ->append_metadata(js('admin.js', 'store'))
			 ->append_metadata(css('admin.css', 'store'));
	
	
			 
	}

	public function index($ajax = FALSE)
	{
		//$this->form_validation->set_rules($this->validation_rules);

		//if(!$this->form_validation->run()):				
		//if(empty($this->input->post())):				
		
			$data["paypal_settings"] = $this->gateway_settings_m->get_paypal_settings();
			$data["paypal_wpp_settings"] = $this->gateway_settings_m->get_paypal_wpp_settings();
			$data["authorizenet_settings"] = $this->gateway_settings_m->get_authorizenet_settings(); 
			
			$this->template
				 ->build('admin/payment_gateways/settings', $data);
		///else:
			///print_r($_POST); exit;
			/*if ( !$this->gateway_settings_m->settings_manager_store() ):
				$this->session->set_flashdata('success', sprintf(lang('store:payment_gateways:messages:success:edit'), $this->input->post('name')));
				redirect('admin/store/payment_gateways');

			else:

				$this->session->set_flashdata(array('error'=> lang('store:payment_gateways:messages:error:edit')));
		
			endif;*/
			
		///endif;
	}
	
	public function save()
	{
		if ( !$this->gateway_settings_m->settings_manager_store() ):
				$this->session->set_flashdata('success', sprintf(lang('store:payment_gateways:messages:success:edit'), $this->input->post('name')));
				redirect('admin/store/payment_gateways');

		else:

			$this->session->set_flashdata(array('error'=> lang('store:payment_gateways:messages:error:edit')));
		
		endif;		
	}

}
/* End of file payment_gateways.php */
/* Location: ./store/controllers/payment_gateways.php */