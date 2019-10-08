<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include_once("classcredomatic.php");

/*
Plugin Name: Credomatic
Description: Credomatic payment method
Author: Julián Andrés Escobar Herrera 
Author URI: 
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Credomatic Payment Gateway.
 *
 * Provides a Credomatic Payment Gateway, mainly for testing purposes.
 */
add_action('plugins_loaded', 'init_credomatic_gateway_class');
function init_credomatic_gateway_class(){

    class WC_Gateway_Credomatic extends WC_Payment_Gateway {

        public $domain;
        public $referencenumber;

        /**
         * Constructor for the gateway.
         */
        public function __construct() {

            $this->domain = 'credomatic_payment';

            $this->id                 = 'credomatic';
            $this->icon               = apply_filters('woocommerce_credomatic_gateway_icon', '');
            $this->has_fields         = false;
            $this->method_title       = __( 'Credomatic', $this->domain );
            $this->method_description = __( 'Allows payments with credomatic gateway.', $this->domain );

            // Load the settings.
            $this->init_form_fields();
            $this->init_settings();

            // Define user set variables
            $this->title        = $this->get_option( 'title' );
            $this->description  = $this->get_option( 'description' );
            $this->instructions = $this->get_option( 'instructions', $this->description );
            $this->order_status = $this->get_option( 'order_status', 'completed' );

            // Actions
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
            add_action( 'woocommerce_thankyou_credomatic', array( $this, 'thankyou_page' ) );

            // credomaticer Emails
            add_action( 'woocommerce_email_before_order_table', array( $this, 'email_instructions' ), 10, 3 );
        }

        /**
         * Initialise Credomatic Settings Form Fields.
         */
        public function init_form_fields() {

            $this->form_fields = array(
                'enabled' => array(
                    'title'   => __( 'Enable/Disable', $this->domain ),
                    'type'    => 'checkbox',
                    'label'   => __( 'Enable Credomatic Payment', $this->domain ),
                    'default' => 'yes'
                ),
                'title' => array(
                    'title'       => __( 'Title', $this->domain ),
                    'type'        => 'text',
                    'description' => __( 'This controls the title which the user sees during checkout.', $this->domain ),
                    'default'     => __( 'Credomatic Payment', $this->domain ),
                    'desc_tip'    => true,
                ),
                'order_status' => array(
                    'title'       => __( 'Order Status', $this->domain ),
                    'type'        => 'select',
                    'class'       => 'wc-enhanced-select',
                    'description' => __( 'Choose whether status you wish after checkout.', $this->domain ),
                    'default'     => 'wc-completed',
                    'desc_tip'    => true,
                    'options'     => wc_get_order_statuses()
                ),
                'description' => array(
                    'title'       => __( 'Description', $this->domain ),
                    'type'        => 'textarea',
                    'description' => __( 'Payment method description that the credomaticer will see on your checkout.', $this->domain ),
                    'default'     => __('Paga con tu tarjeta de crédito vía Credomatic.', $this->domain),
                    'desc_tip'    => true,
                ),
                'instructions' => array(
                    'title'       => __( 'Instructions', $this->domain ),
                    'type'        => 'textarea',
                    'description' => __( 'Instructions that will be added to the thank you page and emails.', $this->domain ),
                    'default'     => '',
                    'desc_tip'    => true,
                ),
            );
        }

        /**
         * Output for the order received page.
         */
        public function thankyou_page() {
            if ( $this->instructions )
                echo wpautop( wptexturize( $this->instructions ) );
        }

        /**
         * Add content to the WC emails.
         *
         * @access public
         * @param WC_Order $order
         * @param bool $sent_to_admin
         * @param bool $plain_text
         */
        public function email_instructions( $order, $sent_to_admin, $plain_text = false ) {
            if ( $this->instructions && ! $sent_to_admin && 'credomatic' === $order->payment_method && $order->has_status( 'on-hold' ) ) {
                echo wpautop( wptexturize( $this->instructions ) ) . PHP_EOL;
            }
        }

        public function payment_fields(){

            if ( $description = $this->get_description() ) {
                echo wpautop( wptexturize( $description ) );
            }
            $plugin_dir_url = plugin_dir_url( __FILE__ );
            ?>
            <style type="text/css">
                #credomatic_input {
                    display: none;
                }
            </style>
            <script type="text/javascript" src="<?php echo $plugin_dir_url; ?>js/credomatic.js"></script>
            <div id="credomatic_input" class="cformev">                
                <div class="margleeven">
                    <div class="rowefirst rowe">
                        <span><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Credit card number<?php else: ?>Número de tarjeta de crédito<?php endif; ?> *</span>
                        <span id="tarjetaerror" class="errorsfront"></span> 
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">                                         
                                <input type="number" name="tarjeta" class="tarjeta" id="tarjeta">  
                                <img class="imgtarjetas" src="<?php echo site_url() ?>/wp-content/uploads/2019/08/tarjetas.png">
                            </div>
                        </div>                       
                    </div>
                    <div class="rowe">
                        <span><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Expiration date<?php else: ?>Fecha de expiración<?php endif; ?>*</span>
                        <span id="mesanoerror" class="errorsfront"></span> 
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                            
                            <select id="mes" name="mes">
                                <option value="" selected="selected" disabled><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Month<?php else: ?>Mes<?php endif; ?></option>
                                <option value="01"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>January<?php else: ?>Enero<?php endif; ?></option>
                                <option value="02"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>February<?php else: ?>Febrero<?php endif; ?></option>
                                <option value="03"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>March<?php else: ?>Marzo<?php endif; ?></option>
                                <option value="04"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>April<?php else: ?>Abril<?php endif; ?></option>
                                <option value="05"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>May<?php else: ?>mayo<?php endif; ?></option>
                                <option value="06"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>June<?php else: ?>Junio<?php endif; ?></option>
                                <option value="07"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>July<?php else: ?>Julio<?php endif; ?></option>
                                <option value="08"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>August<?php else: ?>Agosto<?php endif; ?></option>
                                <option value="09"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>September<?php else: ?>Septiembre<?php endif; ?></option>
                                <option value="10"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>October<?php else: ?>Octubre<?php endif; ?></option>
                                <option value="11"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>November<?php else: ?>Noviembre<?php endif; ?></option>
                                <option value="12"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>December<?php else: ?>Diciembre<?php endif; ?></option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">                            
                            <select id="ano" name="ano">
                                <option value="" selected="selected" disabled><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Year<?php else: ?>Año<?php endif; ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="rowe">
                        <span><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Card Security Code<?php else: ?>Código de seguridad de la tarjeta<?php endif; ?> *</span>  
                        <span id="cvverror" class="errorsfront"></span>                                          
                    </div>
                    <div class="rowe">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadleft">
                            <input type="number" name="cvv" id="cvv" class="cvv" maxlength="4">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 nopadleft">
                            <span class="textcvv"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>3 or 4 digits usually found below the signature field<?php else: ?>3 o 4 dígitos usualmente encontrados debajo del campo de la firma<?php endif; ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <!--<div id="credomatic_input">
                <p class="form-row form-row-wide">
                    <label for="mobile" class=""><?php _e('Mobile Number', $this->domain); ?></label>
                    <input type="text" class="" name="mobile" id="mobile" placeholder="" value="">
                </p>
                <p class="form-row form-row-wide">
                    <label for="transaction" class=""><?php _e('Transaction ID', $this->domain); ?></label>
                    <input type="text" class="" name="transaction" id="transaction" placeholder="" value="">
                </p>
            </div>-->
            <?php
        }

        /**
         * Process the payment and return the result.
         *
         * @param int $order_id
         * @return array
         */
        public function process_payment( $order_id ) {

            $order = wc_get_order( $order_id );

            $status = 'wc-' === substr( $this->order_status, 0, 3 ) ? substr( $this->order_status, 3 ) : $this->order_status;

            // Set order status
            $order->update_status( $status, __( 'Checkout with credomatic payment. ', $this->domain ) );

            // Reduce stock levels
            $order->reduce_order_stock();

            // Remove cart
            WC()->cart->empty_cart();

            // Return thankyou redirect
            return array(
                'result'    => 'success',
                'redirect'  => $this->get_return_url( $order )
            );
        }
    }
}

add_filter( 'woocommerce_payment_gateways', 'add_credomatic_gateway_class' );
function add_credomatic_gateway_class( $methods ) {
    $methods[] = 'WC_Gateway_credomatic'; 
    return $methods;
}

add_action('woocommerce_checkout_process', 'process_credomatic_payment');
function process_credomatic_payment(){    
    if($_POST['payment_method'] != 'credomatic')
        return;

    $error = false;
    if( !isset($_POST['tarjeta']) || empty($_POST['tarjeta']) ) {
        $error = true;
        //wc_add_notice( __('Error : ', 'woothemes') . "Número de tarjeta inválido", 'error' );
        $field = substr_replace( "tarjetaerror", "sisisi", 0);
    }


    if( !isset($_POST['mes']) || empty($_POST['mes']) ) {
        $error = true;
        //wc_add_notice( __('Error : ', 'woothemes') . "Mes inválido", 'error' );
    }


    if( !isset($_POST['ano']) || empty($_POST['ano']) ) {
        $error = true;
       // wc_add_notice( __('Error : ', 'woothemes') . "Año inválido", 'error' );
    }


    if( !isset($_POST['cvv']) || empty($_POST['cvv']) ) {
        $error = true;
        //wc_add_notice( __('Error : ', 'woothemes') . "Cvv inválido", 'error' );
    }

    if ($error) {
        return; 
    }


    $credomatic = new credomatic();    
    $amount = WC()->cart->total;
    $card = $_POST['tarjeta'];
    $mes  = $_POST['mes'];
    $year = $_POST['ano'];
    $cvv  = $_POST['cvv'];

    $mesyear = $mes.$year;
    $a = $credomatic->processtransaction($mesyear, $card,$amount,$cvv);
 
    if ($a == -1){        
        wc_add_notice( __('Error : ', 'woothemes') . "Ha ocurrido un error con el pago, intente nuevamente", 'error' );        
        $logger = wc_get_logger();
        $logger->error( 'Error en pago, Cliente: '.$_POST["billing_first_name"].' '.$_POST["billing_last_name"]. ' Correo:'.$_POST['billing_email'].' Código de respuesta :'.print_r($credomatic->geterrors(),true), array( 'source' => 'credomatic' ) );    
        return;
    }

    $_POST['referencenumber'] = $a;

    
}

/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'credomatic_payment_update_order_meta' );
function credomatic_payment_update_order_meta( $order_id ) {

    if($_POST['payment_method'] != 'credomatic')
        return;

    
    update_post_meta( $order_id, 'referencenumber', $_POST['referencenumber'] );
    
}

/**
    * Add the Gateway to WooCommerce
    **/
    function woocommerce_add_gateway_name_gateway($methods) {
        $methods[] = 'WC_Gateway_Credomatic';
        return $methods;
    }
    
    add_filter('woocommerce_payment_gateways', 'woocommerce_add_gateway_name_gateway' );

/**
 * Display field value on the order edit page
 */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'credomatic_checkout_field_display_admin_order_meta', 10, 1 );
function credomatic_checkout_field_display_admin_order_meta($order){
    
    $method = get_post_meta( $order->get_id(), '_payment_method', true );
    if($method != 'credomatic')
        return;

    $referencenumber = get_post_meta( $order->get_id(), 'referencenumber', true );
    

    echo '<p><strong>'.__( 'Referencia de pago credomatic' ).':</strong> ' . $referencenumber . '</p>';
    ;
}

add_filter( 'woocommerce_form_field', 'bbloomer_checkout_fields_in_label_error', 10, 4 );
 
function bbloomer_checkout_fields_in_label_error( $field, $key, $args, $value ) {   
   if ( strpos( $field, '</label>' ) !== false && $args['required'] ) {
      $error = '<span class="error" style="display:none">';
      $error .= sprintf( __( '%s is a required field.', 'woocommerce' ), $args['label'] );
      $error .= '</span>';
      $field = substr_replace( $field, $error, strpos( $field, '</label>' ), 0);
   }
   return $field;
}