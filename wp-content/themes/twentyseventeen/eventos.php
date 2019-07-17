<?php /* Template Name: Eventos */ 
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
	<?php 
		$total = 4;
		$contador = 1;
		while ( $contador <= $total) {
			 if(($contador % 2)!= 0) { ?>
				<div class="row">
					<div class="col-md-6 margineventop paddingevents">
			      		<div class="imagenevent"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/blog-img-4.jpg">
			      			<div class="fechaevento">2019-00-00</div>
			      		</div>
			      		<?php 
			      			if ($contador !=1 ) { ?>
			      				<div class="marcoizquierdodos"></div>
			      			<?php }
			      		?>
			      		<div class="contentcircu contentevent">
			      			<h3>XIV Convención regional de seguridad</h3>
			      			<p>consectetur adipiscing elit. Dolore est recusandae voluptas autem, vitae nulla soluta</p>
			      			<div class="contentfecevent">
			      				<span class="fechadeevento">Jueves 7, 14 y 21 de febrero de 2019</span>
			      				<span class="horadeevento">01:30 p.m. a 05:30 p.m.</span>
			      			</div>
			      			<div class="btnvermas"><a class="btn-vermas" href="#"><span class="texto-btn">Ver más</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			      		</div>
			      		<?php 
			      			if (($contador+2) <= $total ) { ?>
			      				<div class="marcoizquierdouno"></div>
			      			<?php }
			      		?>
			      	</div>
			<?php }
			if(($contador % 2) == 0) { ?>
					<div class="col-md-6 marginevent margineventop paddingevents">
			      		<div class="imagenevent imageneventdos"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/blog-img-4.jpg">
			      			<div class="fechaevento">2019-00-00</div>
			      		</div>
			      		<?php 
			      			if ($contador !=2 ) { ?>
			      				<div class="marcoderechodos"></div>
			      			<?php }
			      		?>
			      		<div class="contentcircu contentevent">
			      			<h3>XIV Convención regional de seguridad</h3>
			      			<p>consectetur adipiscing elit. Dolore est recusandae voluptas autem, vitae nulla soluta</p>
			      			<div class="contentfecevent">
			      				<span class="fechadeevento">Jueves 7, 14 y 21 de febrero de 2019</span>
			      				<span class="horadeevento">01:30 p.m. a 05:30 p.m.</span>
			      			</div>
			      			<div class="btnvermas"><a class="btn-vermas" href="#"><span class="texto-btn">Ver más</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			      		</div>
			      		<?php 
			      			if (($contador+2) <= $total ) { ?>
			      				<div class="marcoderechoouno"></div>
			      			<?php }
			      		?>
			      	</div>
				</div>
			<?php
			}
		$contador++;
		}
	?>
	<div class="boxpag">
		<ul class="container contaipaginat">
			<li class="bulletactive element"><a href="#">1</a></li>
			<li class=" element"><a href="#">2</a></li>
		</ul>
	</div>
</div>
<?php get_footer();