<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a store module for PyroCMS
 *
 * @author 		pyrocms-store Team - Jaap Jolman - Kevin Meier - Rudolph Arthur Hernandez - Gary Hussey
 * @website		http://www.odin-ict.nl/
 * @package 	pyrocms-store
 * @subpackage 	Store Module
**/
class Store extends Public_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->library('cart');
		//$this->load->library('store_settings');  //AUTO LOADED

		//$this->load->language('general');   //AUTO LOADED
		//$this->load->language('settings');  //AUTO LOADED

		$this->load->language('products');
		$this->load->language('cart');

		$this->load->model('store_m');
		$this->load->model('categories_m');
		$this->load->model('products_m');

		//$this->load->helper('date');   //AUTO LOADED
		
		$this->template
			 ->append_metadata(css('store.css', 'store'))
			 ->append_metadata(js('store.js', 'store'));
	}

	public function index($autions = FALSE)
	{

		if($autions):

			redirect('store/categories/explore/top/tiles');

		else:

			redirect('store/categories/browse/top/tiles');

		endif;
	}
}