<?php  /* Template Name: usa-outlook-filtros */ 
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args  = array(
	'post_type' => 'post',
	'posts_per_page' =>8,
	'cat' => $_POST["cat"],
	'date_query' => array(
		$_POST["date_query"],
	),
);
$r = new WP_Query($args); ?>
<div class="row">
	<div class="contenttot" style="width: 100%;">
	<?php
		$contador = 1;
		$boxrow = '';
	while ($r->have_posts()): $r->the_post(); ?>
	<?php if(($contador % 2)!= 0) { ?>
		<div class="row">
			<?php $boxrow = 'abierto'; ?>
				<div class="col-md-6 margincircutop paddingoutl">
					<div class="imagencircu imgusa"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
					<div class="contentcircu">
						<h3><?php the_title(); ?></h3>
						<!-- <p><?php the_excerpt(); ?></p> -->
						<div class="fecha-usa"><p><?php the_time('d M, Y') ?></p></div>
						<div class="btnvermas btnvermasdos">
							<a class="btn-vermas" href="<?php echo get_permalink(); ?>">
								<span class="texto-btn">Ver ahora</span>
								<span class="separador">|</span><span class="estilo-mas">+</span>
							</a>
						</div>
					</div>
				</div>
			<?php }
	if(($contador % 2)== 0) { ?>
				<div class="col-md-6 marginusatop paddingoutl">
					<div class="imagencircu imgusa imgusa2"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
					<div class="contentcircu">
						<h3><?php the_title(); ?></h3>
						<!-- <p><?php the_excerpt(); ?></p> -->
						<div class="fecha-usa"><p><?php the_time('d M, Y') ?></p></div>
						<div class="btnvermas btnvermasdos">
							<a class="btn-vermas" href="<?php echo get_permalink(); ?>">
								<span class="texto-btn">Ver ahora</span>
								<span class="separador">|</span><span class="estilo-mas">+</span>
							</a>
						</div>
					</div>
				</div>
		</div>
			<?php $boxrow = 'cerrado'; ?>
	<?php } ?>     				
	<?php $contador++;
		endwhile; 
		if($boxrow == 'abierto') { ?>
</div>
<?php } ?>
</div>