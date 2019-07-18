<?php /* Template Name: Singleevento */ 
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
				  				<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 datosevento">
				  					<div class="col-md-12">
				  						<span class="spandatosevento"><i class="fa fa-clock-o" aria-hidden="true"></i> 01:30 p.m. a 05:30 p.m.</span>		
				  					</div>
				  					<div class="col-md-12">
				  						<span class="spandatosevento"><i class="fa fa-map-marker" aria-hidden="true"></i> Hotel Westin Camino Real, Calle Camino Real 0-20 Ciudad Guatemala, 01010 Guatemala + Google Map</span>
				  					</div>
				  					
				  				</div>
				  				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 alright datosevento">
				  					<div class="col-md-12">
				  						<span class="spandatosevento"> Q.375 Afiliados </span>
				  					</div>
				  					<div class="col-md-12">
				  						<span class="spandatosevento"> Q.500 No Afiliados </span>
				  					</div>
				  					
				  				</div>
			  				</div>
			  				<div class="separadorgris topdiez"></div>
			  				<div class="row">
			  					<div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 datosevento">
			  						<div class="alleft topdiez"><a class="btn-vermas" href="#"><span class="texto-btn">Cuentas con membresía</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			  					</div>
			  					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 alright datosevento">
			  						<div class="alright topdiez"><a class="btn-vermas" href="#"><span class="texto-btn">Siguiente</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			  					</div>
			  				</div>
			      			
			      			
			    </div>
		</div>


		<div class="containerdett2 mtop7">
			<div class="ctit alcenter">
				<h3>Le puede Interesar</h3>
				<div class="linea-roja centd"></div>
			</div>

			<div class="col-md-6 margineventop paddingevents">
			    <div class="imagenevent"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/evento-2.png">
			        <div class="fechaevento">2019-00-00</div>
			    </div>
			    <div class="marcoabajo2"></div>
			    <div class="contentcircu contentevent">
			        <h3>¿Que hacer en una inspección de trabajo (SYSO)?</h3>
			        <p>consectetur adipiscing elit. Dolore est recusandae voluptas autem, vitae nulla soluta</p>
			        <div class="contentfecevent">
			            <span class="fechadeevento">Jueves 7, 14 y 21 de febrero de 2019</span>
			            <span class="horadeevento">01:30 p.m. a 05:30 p.m.</span>
			        </div>
			        <div class="btnvermas"><a class="btn-vermas" href="#"><span class="texto-btn">Ver más</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			    </div>
			    
			</div>

			<div class="col-md-6 marginevent margineventop paddingevents">
			    <div class="imagenevent imageneventdos"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/blog-img-4.jpg">
			        <div class="fechaevento">2019-00-00</div>
			    </div>
			    <div class="contentcircu contentevent">
			        <h3>XIV Convención regional de seguridad</h3>
			        <p>consectetur adipiscing elit. Dolore est recusandae voluptas autem, vitae nulla soluta</p>
			        <div class="contentfecevent">
			            <span class="fechadeevento">Jueves 7, 14 y 21 de febrero de 2019</span>
			            <span class="horadeevento">01:30 p.m. a 05:30 p.m.</span>
			        </div>
			        <div class="btnvermas"><a class="btn-vermas" href="#"><span class="texto-btn">Ver más</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			    </div>
			    
			</div>
		</div>
	</div>
	
		


</div>
<?php get_footer();