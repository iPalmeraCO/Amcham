<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="woocommerce-order">

	<?php if ( $order ) : ?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php _e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay', 'woocommerce' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php _e( 'My account', 'woocommerce' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>
				<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Thank you. Your order has been received.</p>
				<p style="text-align: center; margin-top: -30px;">You will receive an email with your order, please check your inbox and/or spam folder.</p>
			<?php else: ?>
				<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received">Gracias. Su pedido ha sido recibido.</p>
				<p style="text-align: center; margin-top: -30px;">Recibirá un email con su pedido, por favor revise su bandeja de entrada y/o carpeta de spam.</p>
			<?php endif; ?>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Order number:<?php else: ?>Número de orden:<?php endif; ?>
					<strong><?php echo $order->get_order_number(); ?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Date:<?php else: ?>Fecha:<?php endif; ?>
					<strong><?php echo wc_format_datetime( $order->get_date_created() ); ?></strong>
				</li>

				<?php if ( is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email() ) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php _e( 'Email:', 'woocommerce' ); ?>
						<strong><?php echo $order->get_billing_email(); ?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php _e( 'Total:', 'woocommerce' ); ?>
					<strong><?php echo $order->get_formatted_order_total(); ?></strong>
				</li>

				<?php if ( $order->get_payment_method_title() ) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Payment method:<?php else: ?>Método de pago:<?php endif; ?>
						<strong><?php echo wp_kses_post( $order->get_payment_method_title() ); ?></strong>
					</li>
				<?php endif; ?>

			</ul>
			<br>
			<div class="alinear-centro check">
				<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>
					<a style="box-shadow: none !important;margin-bottom: -30px;margin-top: 20px;" class="directorios-btn" href="<?php echo get_site_url(); ?>/en/events/">Back</a>
				<?php else: ?>
					<a style="box-shadow: none !important;margin-bottom: -30px;margin-top: 20px;" class="directorios-btn" href="<?php echo get_site_url(); ?>/eventos/">Regresar</a>
				<?php endif; ?>
			</div>

		<?php endif; ?>
		
		<?php //do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>

		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.', 'woocommerce' ), null ); ?></p>

	<?php endif; ?>

</div>
