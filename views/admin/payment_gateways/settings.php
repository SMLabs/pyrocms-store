<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This is a store module for PyroCMS
 *
 * @author 		pyrocms-store Team - Jaap Jolman - Kevin Meier - Rudolph Arthur Hernandez - Gary Hussey
 * @website		http://www.odin-ict.nl/
 * @package 	pyrocms-store
 * @subpackage 	Store Module
**/
?>
<section class="title">
	<h4><?php echo lang('store:payment_gateways:title')?></h4>
</section>

<section class="item">
	
	<div class="tabs ui-tabs ui-widget ui-widget-content ui-corner-all">

		<ul class="tab-menu ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
			<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#gateway-paypal"><span><?php echo lang('store:payment_gateways:label:paypal_standard')?></span></a></li>
			<li class="ui-state-default ui-corner-top"><a href="#gateway-paypal-wpp"><span><?php echo lang('store:payment_gateways:label:website_payments_pro')?></span></a></li>
            <li class="ui-state-default ui-corner-top"><a href="#gateway-authorize"><span><?php echo lang('store:payment_gateways:label:authorizenet')?></span></a></li>
		</ul>
		<div id="paymentGatewaytab">
		<!-- gateway-paypal tab -->
		<div class="form_inputs ui-tabs-panel ui-widget-content ui-corner-bottom" id="gateway-paypal">		
			<fieldset>
            	<?php if( !empty( $paypal_settings ) ):
				
                		$hidden = array('gateway_id' => 1);
						
						echo form_open('admin/store/payment_gateways/save', 'class="crud"', $hidden); ?>
						<ul>
								<li class="<?php echo alternator('even', ''); ?>">
                                    <?php echo lang('store:payment_gateways:label:paypal_enabled','paypal_enabled'); ?> 
                                    <?php if($paypal_settings[0]->is_active == 1) { echo form_checkbox("is_active",'1',TRUE); } else { echo form_checkbox("is_active",'0',FALSE); } ?>				
                                </li>
                                
                                <?php foreach($paypal_settings as $keys => $this->paypal) : ?>
                                <li class="<?php echo alternator('even', ''); ?>">
                                    <?php echo lang('store:payment_gateways:label:'.$this->paypal->slug,$this->paypal->slug); ?> 
                                    <?php echo form_input($this->paypal->slug,set_value($this->paypal->slug,$this->paypal->value),'class="text"'); ?>				
                                </li>
                                <?php endforeach;?> 
                                
                                <li class="<?php echo alternator('even', ''); ?>">
                                    <?php echo lang('store:payment_gateways:label:paypal_developer_mode','paypal_developer_mode'); ?> 
                                    <?php if($paypal_settings[0]->developer_mode == 1) { echo form_checkbox("developer_mode",'1',TRUE); } else { echo form_checkbox("developer_mode",'0',FALSE); } ?>				
                                </li> 
						</ul>
                        
                        <div class="buttons float-right padding-top">
                            <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel'))); ?>
                        </div>
                       
                        
					<?php echo form_close(); ?>
				<?php else:?>
					<h2>No paypal setting found.</h2>
				<?php endif;?> 
			</fieldset>
		</div>     
		
        <!-- Paypal Website Payment Pro tab -->
		<div class="form_inputs ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="gateway-paypal-wpp">
			<fieldset>
            	<?php if( !empty( $paypal_wpp_settings ) ):
					
					$hidden = array('gateway_id' => 2);
					
					echo form_open('admin/store/payment_gateways/save', 'class="crud"', $hidden); ?>
						<ul>
							<li class="<?php echo alternator('even', ''); ?>">
								<?php echo lang('store:payment_gateways:label:paypal_wpp_enabled','paypal_wpp_enabled'); ?> 
                                <?php if($paypal_wpp_settings[0]->is_active == 1) { echo form_checkbox("is_active",'1',TRUE); } else { echo form_checkbox("is_active",'0',FALSE); } ?>				
							</li>
                                
							<?php foreach($paypal_wpp_settings as $keys => $this->paypal_wpp) : ?>
                                <li class="<?php echo alternator('even', ''); ?>">
                                    <?php echo lang('store:payment_gateways:label:'.$this->paypal_wpp->slug,$this->paypal_wpp->slug); ?> 
                                    <?php echo form_input($this->paypal_wpp->slug,set_value($this->paypal_wpp->slug,$this->paypal_wpp->value),'class="text"'); ?>				
                                </li>
							<?php endforeach;?>
                                 
							<li class="<?php echo alternator('even', ''); ?>">
								<?php echo lang('store:payment_gateways:label:paypal_wwp_developer_mode','paypal_wwp_developer_mode'); ?> 
                                <?php if($paypal_wpp_settings[0]->developer_mode == 1) { echo form_checkbox("developer_mode",'1',TRUE); } else { echo form_checkbox("developer_mode",'0',FALSE); } ?>				
                            </li> 
							                                
						</ul>
                        
                        <div class="buttons float-right padding-top">
                            <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel'))); ?>
                        </div>
                        
					<?php echo form_close(); ?>
				<?php else:?>
					<h2>No paypal website payment pro setting found.</h2>
				<?php endif;?> 
			</fieldset>        
		</div>
        
        <!-- authorize.net tab -->
		<div class="form_inputs ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide" id="gateway-authorize">
			<fieldset>
            	<?php if( !empty( $authorizenet_settings ) ):
					
					$hidden = array('gateway_id' => 3);
					
					echo form_open('admin/store/payment_gateways/save', 'class="crud"', $hidden); ?>
						<ul>
                            <li class="<?php echo alternator('even', ''); ?>">
                                <?php echo lang('store:payment_gateways:label:authorize_enabled','authorize_enabled'); ?> 
                                <?php if($authorizenet_settings[0]->is_active == 1) { echo form_checkbox("is_active",'1',TRUE); } else { echo form_checkbox("is_active",'0',FALSE); } ?>				
                            </li>
                            
							<?php foreach($authorizenet_settings as $keys => $this->authorizenet) : ?>     
                                <li class="<?php echo alternator('even', ''); ?>">
                                    <?php echo lang('store:payment_gateways:label:'.$this->authorizenet->slug,$this->authorizenet->slug); ?> 
                                    <?php echo form_input($this->authorizenet->slug,set_value($this->authorizenet->slug,$this->authorizenet->value),'class="text"'); ?>				
                                </li>
                           <?php endforeach;?>
                                       
                            <li class="<?php echo alternator('even', ''); ?>">
                                <?php echo lang('store:payment_gateways:label:authorize_developer_mode','authorize_developer_mode'); ?> 
                                <?php if($authorizenet_settings[0]->developer_mode == 1) { echo form_checkbox("developer_mode",'1',TRUE); } else { echo form_checkbox("developer_mode",'0',FALSE); } ?>				
                            </li> 
							                          
						</ul>
                        
                        <div class="buttons float-right padding-top">
                            <?php $this->load->view('admin/partials/buttons', array('buttons' => array('save', 'save_exit', 'cancel'))); ?>
                        </div>
                        
					<?php echo form_close(); ?>
				<?php else:?>
					<h2>No authorize.net setting found.</h2>
				<?php endif;?> 
			</fieldset>        
		</div>

        
	</div>
	</div>
</section>