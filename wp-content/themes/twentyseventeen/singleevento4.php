<?php /* Template Name: Singleevento4 */ 
get_header(); ?>
<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light tit-light-margindos"><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		</div>	
	</div>
</div>
<div class="container">
	
	<div class="containerdetalleeventos col-lg-12">


		<div class="col-md-12 margineventop paddingevents">
			 <div class="imgdetevento">
			 	<img class="bimgdetevent" src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/evento-detalle.png">			      			
			  </div>
			  <div class="marcoabajo3"></div>
			  <div class="conteventdeta">
			  				<div class="row">
				  				<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
				  					<h3>XIV Convención regional de seguridad</h3>		
				  				</div>
				  				<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 alright">
				  					<span class="fechadet"> Miercoles 13 de Febrero 2019 </span>
				  				</div>
			  				</div>
			      			
			      			<p class="descdetevento">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, consequuntur eius repellendus eos aliquid molestiae ea laborum ex quibusdam laudantium voluptates placeat consectetur quam aliquam beatae soluta accusantium iusto nihil nesciunt unde veniam magnam repudiandae sapiente.</p>
			      			<div class="separadorgris"></div>
			      			<div class="row">
				  				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 datosevento">
				  					<div class="col-md-12">
				  						<span class="titrojo">Total</span>		

				  					</div>
				  					<div class="col-md-12">
				  						<span class="spandatosevento"> Q.1125.00 </span>
				  					</div>
				  					
				  				</div>
				  				
			  				</div>
			  				<div class="separadorgris topdiez"></div>
			  				
			  				<div class="row">			  					
			  					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  datosevento">
			  						<form class="pedidoevento">
			  							<div class="rowe">
			  								<input type="checkbox" name="asd"><span class="t1">Pago con cheque</span>
			  								<div class="margleeven">
			  									<p class="topdiez">Por favor, envía un cheque a Nombre de la tienda, Calle de la tienda, Ciudad de la tienda, Provincia/País de la tienda. Código postal de la tienda. </p>
			  								</div>
			  							</div>
			  							<div class="cformev">
			  								<div class="rowe">
			  									<input type="checkbox" name="asd"><span class="t1">Paga con tu tarjeta de crédito vía Credomatic.</span>	
			  								</div>
			  								<div class="margleeven">
				  								<div class="rowefirst rowe">
				  									<span>Número de tarjeta de crédito *</span>
				  									<div class="row">
					  									<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">			  								
					  										<input type="text" name="tarjeta" class="tarjeta">	
					  										<img class="imgtarjetas" src="<?= site_url(); ?>/wp-content/uploads/2019/08/tarjetas.png"/>
					  									</div>
				  									</div>
				  								</div>
				  								<div class="rowe">
				  									<span>Fecha de expiración*</span>
				  								</div>
				  								<div class="row">
					  								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					  									<select>
					  										<option>Mes</option>
					  									</select>
					  								</div>
					  								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					  									<select>
					  										<option>Año</option>
					  									</select>
					  								</div>
				  								</div>
				  								<div class="rowe">
				  									<span>Código de seguridad de la tarjeta *</span>			  								
				  								</div>
				  								<div class="rowe">
				  									<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 nopadleft">
				  										<input type="text" name="cvv" class="cvv">
				  									</div>
					  								<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 nopadleft">
					  									<span class="textcvv">3 o 4 dígitos usualmente encontrados debajo del campo de la firma</span>
					  								</div>
				  								</div>
			  								</div>
			  							</div>
			  						</form>
			  						<div class="alright topdiez"><a class="btn-vermas topveinte" href="#"><span class="texto-btn">Realizar pedido</span><span class="separador">|</span><span class="estilo-mas">></span></a></div>
			  					</div>
			  				</div>
			      			
			      			
			    </div>
		</div>


	
	</div>		


</div>
<?php get_footer();