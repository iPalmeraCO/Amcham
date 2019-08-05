<?php /* Template Name: Singleevento3 */ 
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
	<div class="containerdetalleeventos">
		<div class="ctit alcenter margineventop">
				<h3>Detalles de facturación</h3>
				<div class="linea-roja centd"></div>
			</div>

		<div class="col-md-12 margineventop paddingevents">
			<?php echo do_shortcode( '[contact-form-7 id="409" title="Facturación eventos"]' ); ?>			
		</div>


	
	</div>
	
	<div class="containerdetalleeventos col-lg-12">
		<div class="ctit alcenter margineventop">
				<h3>Su pedido</h3>
				<div class="linea-roja centd"></div>
			</div>

		<div class="col-md-12 margineventop paddingevents">
			 <div class="imgdetevento">
			 	<img class="bimgdetevent" src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/evento-detalle.png">			      			
			  </div>
			  <div class="marcoabajo"></div>
			  <div class="conteventdeta">
			  				<div class="row">
				  				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
				  					<h3>XIV Convención regional de seguridad</h3>		
				  				</div>
				  				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 alright">
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
			  					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 alright datosevento">
			  						<div class="alright topdiez"><a class="btn-vermas" href="#"><span class="texto-btn">Siguiente</span><span class="separador">|</span><span class="estilo-mas">></span></a></div>
			  					</div>
			  				</div>
			      			
			      			
			    </div>
		</div>


	
	</div>		


</div>
<?php get_footer();