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

	 $args  = array(
       
       'orderby' => 'date',
       'post_type' => 'product',
       'posts_per_page' => -1
   );
   $r     = new WP_Query($args);
   
   //print_r($r);

		$total = $r;
		$contador = 1;
		while ($r->have_posts()) :
        $r->the_post();     
        global $product;                   
       
			 if(($contador % 2)!= 0) { ?>
				<div class="row">
					<div class="col-md-6 margineventop paddingevents">
			      		<div class="imagenevent"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/blog-img-4.jpg">
			      			<div class="fechaevento"><?php echo $product->get_attribute( 'fecha2' ); ?></div>
			      		</div>
			      		<?php 
			      			if ($contador !=1 ) { ?>
			      				<div class="marcoizquierdodos"></div>
			      			<?php }
			      		?>
			      		<div class="contentcircu contentevent">
			      			<h3><?php echo the_title(); ?></h3>
			      			<p><?php the_excerpt(); ?></p>
			      			<div class="contentfecevent">
			      				<span class="fechadeevento"><?php echo $product->get_attribute( 'fecha' ); ?></span>
			      				<span class="horadeevento"><?php echo $product->get_attribute( 'hora' ); ?></span>
			      			</div>
			      			<div class="btnvermas btnvermaseventos"><a class="btn-vermas" href="<?php echo get_permalink(); ?>"><span class="texto-btn">Ver más</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			      		</div>
			      		<?php 
			      			if ($contador == 1 ) { ?>
			      				<div class="marcoizquierdouno"></div>
			      			<?php }
			      		?>
			      	</div>
			<?php }
			if(($contador % 2) == 0) { ?>
					<div class="col-md-6 marginevent margineventop paddingevents">
			      		<div class="imagenevent imageneventdos"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/blog-img-4.jpg">
			      			<div class="fechaevento"><?php echo $product->get_attribute( 'fecha2' ); ?></div>
			      		</div>
			      		<?php 
			      			if ($contador !=2 ) { ?>
			      				<div class="marcoderechodos"></div>
			      			<?php }
			      		?>
			      		<div class="contentcircu contentevent">
			      			<h3><?php echo the_title(); ?></h3>
			      			<p><?php the_excerpt(); ?></p>
			      			<div class="contentfecevent">
			      				<span class="fechadeevento"><?php echo $product->get_attribute( 'fecha' ); ?></span>
			      				<span class="horadeevento"><?php echo $product->get_attribute( 'hora' ); ?></span>
			      			</div>
			      			<div class="btnvermas btnvermaseventos"><a class="btn-vermas" href="<?php echo get_permalink(); ?>"><span class="texto-btn">Ver más</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			      		</div>
			      		<?php 
			      			if ($contador == 2) { ?>
			      				<div class="marcoderechoouno"></div>
			      			<?php }
			      		?>
			      	</div>
				</div>
			<?php
			}
		$contador++;
		endwhile;
	?>
	<!--<div class="boxpag">
		<ul class="container contaipaginat">
			<li class="bulletactive element"><a href="#">1</a></li>
			<li class=" element"><a href="#">2</a></li>
		</ul>
	</div>-->
</div>
<?php get_footer();