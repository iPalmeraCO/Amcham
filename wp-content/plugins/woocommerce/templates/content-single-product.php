<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<style type="text/css">
	.step2, #add-to-cart {
		display: none;
	}
</style>
<script type="text/javascript">
	$( document ).ready(function() {
    	$( "#quantity" ).keyup(function() {		
		   var cantidad = $("#quantity").val();
		   var precio   = $("#valor").val();
		   $("#vtotal").html(cantidad*precio);
		});

	});

	function siguiente(paso){
		 $(".step1").hide();
		 $(".step2").show();
	}

	function add_to_cart(){
		$("#add-to-cart").click();
	}
</script>
<!-- <div class="banner">
	<img width="1280" height="418" src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/grupo-personas-2.jpg" class="attachment-full size-full wp-post-image" alt="" sizes="100vw">		<div class="containertits">
	 	<h1 class="tit1 titulo-light tit-light-margindos">Nuestros</h1>
	 	<h1 class="titulo-bold-dos">Eventos</h1>
	</div>	
</div> -->
<div class="container">

<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<?php
	/**
	 * Hook: woocommerce_before_single_product_summary.
	 *
	 * @hooked woocommerce_show_product_sale_flash - 10
	 * @hooked woocommerce_show_product_images - 20
	 */
	//do_action( 'woocommerce_before_single_product_summary' );
	?>
	<div class="containerdetalleeventos">
		<div class="col-md-12 margineventop paddingevents">
			<div class="imgdetevento">
		 			<img class="bimgdetevent" src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/evento-detalle.png">		
		 	</div>
		  	<div class="marcoabajo"></div>
		  	<?php //do_action('woo_custom_breadcrumb');  ?>
			<div class="conteventdeta">
					  				<div class="row">
						  				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
						  					<h3><?php the_title(); ?></h3>		
						  				</div>
						  				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 alright">
						  					<span class="fechadet"> <?php echo $product->get_attribute( 'fecha' ); ?> </span>
						  				</div>
					  				</div>
					      			
					      			<p class="descdetevento">
					      				<?php the_excerpt(); ?>			      					
					      			</p>
					      			<div class="separadorgris"></div>
					      			<div class="steps step1">					      			
						      			<div class="row">
							  				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 datosevento">
							  					<div class="col-md-12">
							  						<span class="spandatosevento"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $product->get_attribute( 'hora' ); ?></span>		
							  					</div>
							  					<div class="col-md-12">
							  						<span class="spandatosevento"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $product->get_attribute( 'lugar' ); ?></span>
							  					</div>
							  					
							  				</div>
							  				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 alright datosevento">
							  					<div class="col-md-12">
							  						<span class="spandatosevento"> <?php echo get_woocommerce_currency_symbol()." "; ?> <?= the_field('preciomembresia'); ?>  <?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Membership<?php else: ?>Socio<?php endif; ?> </span>
							  					</div>
							  					<div class="col-md-12">
							  						<span class="spandatosevento"> <?php echo get_woocommerce_currency_symbol()." "; ?> <?= $product->get_regular_price(); ?> <?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>No membership<?php else: ?>No socio<?php endif; ?> </span>
							  					</div>
							  					
							  				</div>
						  				</div>

						  					<div class="separadorgris topdiez"></div>
							  				<div class="row">
							  					<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 datosevento">
							  						<?php if (!is_customer()) : ?>
							  							<div class="alleft topdiez"><a class="btn-vermas" href="<?php echo get_site_url(); ?>/my-account"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Membership Accounts<?php else: ?>Cuentas con membresía<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">></span></a></div>
							  						<?php endif; ?>
							  					</div>
							  					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 alright datosevento">
							  						<div class="alright topdiez"><a class="btn-vermas" onclick="siguiente(2)"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Next<?php else: ?>Siguiente<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">></span></a></div>
							  					</div>
							  				</div>

					  				</div>
					  				<div class="steps step2">
					  					<form class="cart" action="" method="post" enctype="multipart/form-data">
						  					<div class="row"> 
						  						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 datosevento">
								  					<div class="col-md-12">
								  						<span class="titrojo"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Price<?php else: ?>Precio<?php endif; ?></span>	
								  					</div>
								  					<div class="col-md-12">
								  						<?php if (is_customer()) : ?>
								  							<span class="spandatosevento precio"><?php echo get_woocommerce_currency_symbol()." "; ?> <?= the_field('preciomembresia');  ?> <?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Membership<?php else: ?>socio<?php endif; ?> </span>
								  						<?php else: ?>
								  							<span class="spandatosevento precio"><?php echo get_woocommerce_currency_symbol()." "; ?> <?= $product->get_price(); ?> <?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>No membership<?php else: ?>No socio<?php endif; ?> </span>
								  						<?php endif; ?>
								  					</div>							  					
								  				</div>
							  					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 alcenter datosevento">
								  					<div class="col-md-12">
								  						<span class="titrojo"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Quantity<?php else: ?>Cantidad<?php endif; ?></span>
								  					</div>
								  					<div class="col-md-12 ">
								  						<span class="spandatosevento">
								  							<input type="hidden" name="valor" id="valor" value="<?= $product->get_price() ;?>">
								  							<input type="number" id="quantity" class="input-text qty text" step="1" min="1" max="" name="quantity" value="1" title="Qty" size="4" inputmode="numeric">
								  						</span>
								  					</div>					  					
							  					</div>
						  						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 alright datosevento">
						  							<div class="col-md-12">
						  								<span class="titrojo">Total</span>		
						  							</div>
						  							<div class="col-md-12">
						  								<span class="spandatosevento"> <?php echo get_woocommerce_currency_symbol()." "; ?> <span id="vtotal"><?= $product->get_price(); ?></span>  </span>
						  							</div>				  					
						  						</div>
					  						</div>
					  						<div class="separadorgris topdiez"></div>
								  			<div class="row">
							  					<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 datosevento">
							  						<?php if (!is_customer()) : ?>
							  							<div class="alleft topdiez"><a class="btn-vermas" href="<?php echo get_site_url(); ?>/my-account"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Membership Accounts<?php else: ?>Cuentas con membresía<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
							  						<?php endif; ?>
							  					</div>
							  					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 alright datosevento">
							  						<button id="add-to-cart" type="submit" name="add-to-cart" value="<?php echo $product->get_id(); ?>" class="single_add_to_cart_button button alt">Add to cart</button>
							  						<input type="hidden" name="is_buy_now" id="is_buy_now" value="1" />
							  						<div class="alright topdiez"><a class="btn-vermas" onclick="add_to_cart()"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Next<?php else: ?>Siguiente<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">></span></a></div>
							  					</div>
						  					</div>
					  					</form>
					  				</div>

					  			
				</div>
			</div>

			<div class="containerdett2 mtop7">
			<div class="ctit alcenter">
				<h3><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>It may interest you<?php else: ?>Le puede interesar<?php endif; ?></h3>
				<div class="linea-roja centd"></div>
			</div>

			<?php 

				$args  = array(
			       
			       'orderby' => 'date',
			       'post__not_in' => array(get_the_ID()),
			       'orderby'   => 'rand',
			       'post_type' => 'product',
			       'posts_per_page' => 2
			   );
			   	$r = new WP_Query($args);
			   
			   //print_r($r);

					$total = $r;
					$contador = 1;
					while ($r->have_posts()) :
			        $r->the_post();     
			        global $product;   
			 ?>
			 <?php if ($contador == 1) {?>
			<div class="col-md-6 margineventop paddingevents">
			    <div class="imagenevent"><img src="<?php echo get_the_post_thumbnail_url(); ?>">
			        <div class="fechaevento"><?php echo $product->get_attribute( 'fecha2' ); ?></div>
			    </div>
			    <div class="marcoabajo2"></div>
			    <div class="contentcircu contentevent">
			        <h3><?php echo the_title(); ?></h3>
			      	<p><?php the_excerpt(); ?></p>
			        <div class="contentfecevent">
			            <span class="fechadeevento"><?php echo $product->get_attribute( 'fecha' ); ?></span>
			      		<span class="horadeevento"><?php echo $product->get_attribute( 'hora' ); ?></span>
			        </div>
			        <div class="btnvermas btnvermaseventos"><a class="btn-vermas" href="<?php echo get_permalink(); ?>"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>View more<?php else: ?>Ver más<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			    </div>
			    
			</div>
			<?php } else { ?>

			<div class="col-md-6 marginevent margineventop paddingevents">
			    <div class="imagenevent imageneventdos"><img src="<?php echo get_the_post_thumbnail_url(); ?>">
			        <div class="fechaevento"><?php echo $product->get_attribute( 'fecha2' ); ?></div>
			    </div>
			    <div class="contentcircu contentevent">
			       	<h3><?php echo the_title(); ?></h3>
			      	<p><?php the_excerpt(); ?></p>
			        <div class="contentfecevent">
			            <span class="fechadeevento"><?php echo $product->get_attribute( 'fecha' ); ?></span>
			      		<span class="horadeevento"><?php echo $product->get_attribute( 'hora' ); ?></span>
			        </div>
			        <div class="btnvermas btnvermaseventos"><a class="btn-vermas" href="<?php echo get_permalink(); ?>"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>View more<?php else: ?>Ver más<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			    </div>
			    
			</div>
				<?php 
				}
				$contador++;
				endwhile;
				?>
		</div>

		</div>
					    
	<div class="steps step1">
		<div class="summary entry-summary">
			<?php
			/**
			 * Hook: woocommerce_single_product_summary.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			//do_action( 'woocommerce_single_product_summary' );
			?>
		</div>
	</div>
	<div class="step2">
	</div>
	
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	//do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>
