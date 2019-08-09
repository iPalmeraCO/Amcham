<?php
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

            <script type="text/javascript" src="<?php echo $plugin_dir_url; ?>js/credomatic.js"></script>
            <div id="credomatic_input" class="cformev">                
                <div class="margleeven">
                    <div class="rowefirst rowe">
                        <span>Número de tarjeta de crédito *</span>
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">                                         
                                <input type="text" name="tarjeta" class="tarjeta" id="tarjeta">  
                                <img class="imgtarjetas" src="<?php echo site_url() ?>/wp-content/uploads/2019/08/tarjetas.png">
                            </div>
                        </div>
                    </div>
                    <div class="rowe">
                        <span>Fecha de expiración*</span>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <select id="mes" name="mes">
                                <option value="" selected="selected" disabled>Mes</option>
                                <option value="01">Enero</option>
                                <option value="02">Febrero</option>
                                <option value="03">Marzo</option>
                                <option value="04">Abril</option>
                                <option value="05">Mayo</option>
                                <option value="06">Junio</option>
                                <option value="07">Julio</option>
                                <option value="08">Agosto</option>
                                <option value="09">Septiembre</option>
                                <option value="10">Octubre</option>
                                <option value="11">Noviembre</option>
                                <option value="12">Diciembre</option>
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <select id="ano" name="ano">
                                <option value="" selected="selected" disabled>Año</option>
                            </select>
                        </div>
                    </div>
                    <div class="rowe">
                        <span>Código de seguridad de la tarjeta *</span>                                            
                    </div>
                    <div class="rowe">
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadleft">
                            <input type="number" name="cvv" class="cvv" maxlength="4">
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 nopadleft">
                            <span class="textcvv">3 o 4 dígitos usualmente encontrados debajo del campo de la firma</span>
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

    $tarjeta = $_POST['tarjeta'];
    $mes = $_POST['mes'];
    $ano = $_POST['ano'];
    $cvv = $_POST['cvv'];
    

    /*if( !isset($_POST['mobile']) || empty($_POST['mobile']) )
        wc_add_notice( __( 'Please add your mobile number', $this->domain ), 'error' );


    if( !isset($_POST['transaction']) || empty($_POST['transaction']) )
        wc_add_notice( __( 'Please add your transaction ID', $this->domain ), 'error' );*/

}

/**
 * Update the order meta with field value
 */
add_action( 'woocommerce_checkout_update_order_meta', 'credomatic_payment_update_order_meta' );
function credomatic_payment_update_order_meta( $order_id ) {

    if($_POST['payment_method'] != 'credomatic')
        return;

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // exit();

    update_post_meta( $order_id, 'mobile', $_POST['mobile'] );
    update_post_meta( $order_id, 'transaction', $_POST['transaction'] );
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
    $method = get_post_meta( $order->id, '_payment_method', true );
    if($method != 'credomatic')
        return;

    $mobile = get_post_meta( $order->id, 'mobile', true );
    $transaction = get_post_meta( $order->id, 'transaction', true );

    echo '<p><strong>'.__( 'Mobile Number' ).':</strong> ' . $mobile . '</p>';
    echo '<p><strong>'.__( 'Transaction ID').':</strong> ' . $transaction . '</p>';
}