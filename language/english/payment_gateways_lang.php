<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This is a store module for PyroCMS
 *
 * @author 		pyrocms-store Team - Jaap Jolman - Kevin Meier - Rudolph Arthur Hernandez - Gary Hussey
 * @website		http://www.odin-ict.nl/
 * @package 	pyrocms-store
 * @subpackage 	Store Module
**/

/* =========================================== STORE =========================================== */

// MENU ------------------------------------------------------------------------------------------

$lang['store:payment_gateways:menu']							= 'Payment Gateways';

// SHORTCUTS -------------------------------------------------------------------------------------

$lang['store:payment_gateways:shortcut:list']					= 'List Payment Gateways';
$lang['store:payment_gateways:shortcut:add']					= 'Add Payment Gateways';


// TITLES ----------------------------------------------------------------------------------------

$lang['store:payment_gateways:title']							= 'Payment Gateways';
$lang['store:payment_gateways:title:add']						= 'Add';
$lang['store:payment_gateways:title:edit']					= 'Edit';

// LABELS ----------------------------------------------------------------------------------------

$lang['store:payment_gateways:label:name']					= 'Name';
$lang['store:payment_gateways:label:html']					= 'Description';
$lang['store:payment_gateways:label:actions']					= 'Actions';

$lang['store:payment_gateways:label:paypal_standard']			= 'Paypal Standard';
$lang['store:payment_gateways:label:paypal_enabled']			= 'Paypal Enabled';
$lang['store:payment_gateways:label:paypal_account']			= 'Paypal Account';
$lang['store:payment_gateways:label:paypal_developer_mode']		= 'Developer Mode';

$lang['store:payment_gateways:label:website_payments_pro']			= 'Paypal Website Payments Pro';
$lang['store:payment_gateways:label:paypal_wpp_enabled']			= 'Paypal WPP Enabled';
$lang['store:payment_gateways:label:paypal_api_key']			= 'API Key/Secret';
$lang['store:payment_gateways:label:paypal_wwp_developer_mode']		= 'Developer mode';

$lang['store:payment_gateways:label:authorizenet']		= 'Authorize.net';
$lang['store:payment_gateways:label:authorize_enabled']			= 'Authorize.net Enabled';
$lang['store:payment_gateways:label:authorize_account']			= 'Authorize.net Token';
$lang['store:payment_gateways:label:authorize_secret']			= 'Authorize.net Secret';
$lang['store:payment_gateways:label:authorize_developer_mode']	= 'Developer mode';


// MESSAGES --------------------------------------------------------------------------------------

$lang['store:payment_gateways:messages:information:no_items']	= 'No Payment Gateways created';
$lang['store:payment_gateways:messages:success:add']			= 'Payment Gateways sucessfully created';
$lang['store:payment_gateways:messages:success:edit']			= 'Payment Gateways sucessfully edited';
$lang['store:payment_gateways:messages:success:delete']		= 'Payment Gateways sucessfully deleted';
$lang['store:payment_gateways:messages:error:add']			= 'Payment Gateways creation failed';
$lang['store:payment_gateways:messages:error:edit']			= 'Payment Gateways editing failed';
$lang['store:payment_gateways:messages:error:delete']			= 'Payment Gateways deletion failed';

// BUTTONS ---------------------------------------------------------------------------------------

$lang['store:payment_gateways:buttons:edit']					= 'Edit';
$lang['store:payment_gateways:buttons:delete']				= 'Delete';

/* End of file payment_gateways_lang.php */