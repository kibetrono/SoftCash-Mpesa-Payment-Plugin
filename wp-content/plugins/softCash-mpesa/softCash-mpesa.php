<?php

// To prevent direct access to the plugin.

defined('ABSPATH') or die("No access please!");

/* Plugin Name: SoftCash

* Plugin URI: https://developers.paymentsds.org/

* Description: Receive payments directly to your business through M-Pesa.

* Version: 1.0.0 

* Text Domain: softcash-mpesa-wp-plugin

* Author: David Rono (SoftwaresKe)

* Author URI: https://developers.paymentsds.org/

* Copyright: © 2023 Softwakeske. (https://developers.paymentsds.org/)

* Licence: GPL2

* License URI: http://www.gnu.org/licenses/gpl-3.0.en.html

* WC requires at least: 2.2

* WC tested up to: 4.9.7

*/

add_action('plugins_loaded', 'swke_softcash_mpesa', 0);

function swke_softcash_mpesa(){

    if (!class_exists('WC_Payment_Gateway')) { return; }

    class SoftCash_WP_Plugin extends WC_Payment_Gateway{

        public function __construct(){

            // *************************************************** custom code for softCash Plugin **********************************************************

            $this->id = 'softcash-mpesa-wp-plugin';
            $this->icon = apply_filters('mpesa_wp_icon',plugin_dir_url(__FILE__) . 'logo.jpg');
            $this->has_fields = false;
            $this->method_title = __('SoftCash', 'softcash-mpesa-wp-plugin');
            $this->method_description = __('Enable Mpesa payments for your business', 'softcash-mpesa-wp-plugin');

            // Load settings
            $this->init_form_fields();
            $this->init_settings();

            // variables
            $this->title                = $this->get_option('title');
            $this->description          = $this->get_option('description');
            $_SESSION['ck']             = $this->get_option('consumer_key');
            $_SESSION['cs']             = $this->get_option('consumer_secret');
            $_SESSION['shortcode']      = $this->get_option('shortcode');

            // add_action('woocommerce_update_options_payment_gateways_' . $this->id,array($this, 'process_admin_options'));

            // *************************************************** end of custom code for softCash Plugin ***************************************************

        }  // end of construct

        /**
		 * Plugin options
		 */
		public function init_form_fields() {

			$this->form_fields = array(

				'enabled' => array(
					'title'         => __('Enable/Disable', 'softcash-mpesa-wp-plugin'),
					'label'         => __('Enable SoftCash plugin', 'softcash-mpesa-wp-plugin'),
					'type'          => 'checkbox',
					'description'   => '',
					'default'       => 'no'
				),

                'title' => array(
                    'title'         => __('Title', 'softcash-mpesa-wp-plugin'),
                    'type'          => 'text',
                    'description'   => __('This controls the title which the user sees during checkout', 'softcash-mpesa-wp-plugin'),
                    'default'       => __('MPESA', 'softcash-mpesa-wp-plugin'),
                    'desc_tip'      => true,
                ),

                'description' => array(
                    'title'         => __('Description', 'softcash-mpesa-wp-plugin'),
                    'type'          => 'textarea',
                    'description'   => __('Payment method description that the customer will see on checkout.', 'softcash-mpesa-wp-plugin'),
                    'default'       => __('Directly pay for your products from Mpesa'),
                    'desc_tip'      => true,
                ),

                'consumer_key' => array(
                    'title'         => __('Consumer Key', 'softcash-mpesa-wp-plugin'),
                    'default'       => __('', 'softcash-mpesa-wp-plugin'),
                    'type'          => 'password',
                ),

                'consumer_secret'   => array(
                    'title'         => __('Consumer Secret', 'softcash-mpesa-wp-plugin'),
                    'default'       => __('', 'softcash-mpesa-wp-plugin'),
                    'type'          => 'password',
                ),

                'passkey' => array(
                    'title'         =>  __('Online Pass Key', 'softcash-mpesa-wp-plugin'),
                    'default'       => __('', 'softcash-mpesa-wp-plugin'),
                    'type'          => 'password',
                ),

                'shortcode' => array(
                    'title'         => __('Business Shortcode', 'softcash-mpesa-wp-plugin'),
                    'default'       => __('', 'softcash-mpesa-wp-plugin'),
                    'type'          => 'number',
                )
				
			);
		}

    } // end of class SoftCash_WP_Plugin

    function swke_woocommerce_mpesa_add_gateway_class($methods){

        $methods[] = 'SoftCash_WP_Plugin';

        return $methods;
    }

    if (!add_filter('woocommerce_payment_gateways', 'swke_woocommerce_mpesa_add_gateway_class')){

        die;
    }

}  // end of swke_softcash_mpesa function