<?php /* Template Name: Perfiles de estado */ 
get_header(); ?>
<div class="container bread">
	<div class="cont-bread sobre-amcham">
		<a class="home" href="<?php echo get_home_url(); ?>"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Home<?php else: ?>Inicio<?php endif; ?></a>
		<span class="slash">/</span>
		<div class="home"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Services<?php else: ?>Servicios<?php endif; ?></div>
		<span class="slash">/</span>
		<a class="home" href="<?php echo get_home_url(); ?>/trade-center/">Trade Center</a>
		<span class="slash">/</span>
		<div class="home"><?php the_title(); ?></div>
	</div>
</div>
<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light "><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		</div>	
	</div>
</div>
<div>
	<div class="container">
		<?php   
	      while ( have_posts() ) : the_post();
	        the_content();
	      endwhile; // End of the loop.
	    ?>
	    	<div>
			<?php 
				$currentlang = get_bloginfo('language');
				if($currentlang=="en-US"){
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args  = array(
				       'cat' => 159,
				       'post_type' => 'post',
				       'posts_per_page' =>5,
				       'orderby'=>'date',
				       'lang' => 'en',
				       'order' => 'DESC', 
				       'paged' => $paged
					);
					$r = new WP_Query($args);
				} else{
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					$args  = array(
				       'cat' => 7,
				       'post_type' => 'post',
				       'posts_per_page' =>5,
				       'orderby'=>'date',
				       'lang' => 'es',
				       'order' => 'DESC', 
				       'paged' => $paged
					);
					$r = new WP_Query($args);
				}
				
				?>
			   	<div class="contenttot">
			   	<?php
			   		$contador = 1;
			   		$boxrow = '';
			        while ($r->have_posts()): $r->the_post(); ?>
        				<?php if(($contador % 2)!= 0) { ?>
					      <div class="row">
					      	<?php $boxrow = 'abierto'; ?>
					      	<div class="col-md-6 margincircutop paddingoutl">
					      		<div class="imagencircu imgusa"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
					      		<?php 
					      			if ($contador ==3 ) { ?>
					      				<div class="marcoizquierdopostuno"></div>
					      			<?php }
					      		?>
					      		<div class="contentcircu" style="text-align: center;">
					      			<h3><?php the_title(); ?></h3>
					      			<!-- <p><?php the_excerpt(); ?></p> -->
					      			<div class="btnvermas">
					      				<a class="btn-vermas" href="<?php echo get_permalink(); ?>"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>View now<?php else: ?>Ver ahora<?php endif; ?></span></span><span class="separador">|</span><span class="estilo-mas">+</span></a>
					      			</div>
					      		</div>
					      		<?php 
					      			if ($contador == 1 ) { ?>
					      				<div class="marcoizquierdoposttres"></div>
					      			<?php }
					      		?>
					      	</div>
					    <?php }
					    if(($contador % 2)== 0) { ?>
					    	<div class="col-md-6 marginusatop paddingoutl">
					    		<?php 
					      			if ($contador == 4 ) { ?>
					      				<div>
					      			<?php }
					      		?>
					      		<div class="imagencircu imgusa imgusa2"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
					      		<div class="contentcircu" style="text-align: center;">
					      			<h3><?php the_title(); ?></h3>
					      			<!-- <p><?php the_excerpt(); ?></p> -->
					      			<div class="btnvermas"><a class="btn-vermas" href="<?php echo get_permalink(); ?>"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>View now<?php else: ?>Ver ahora<?php endif; ?></span></span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
					      		</div>
					      		<?php 
					      			if ($contador == 4 ) { ?>
					      				</div>
					      			<?php }
					      		?>
					      	</div>
					      	</div>
					      <?php $boxrow = 'cerrado'; ?>
					    <?php } ?>     				
        			<?php $contador++;
        			endwhile; 
        			if($boxrow == 'abierto') { ?>
        				</div>
					<?php }
        			?>
	    </div>
	</div>
</div>
<?php get_footer();




