<?php 
get_header();?>
<div id="" class="content-area">
	<div class="banner">
		<img width="1280" height="418" src="<?php echo get_site_url().get_post_meta($post->ID, 'imgbannerusaoutlook', true); ?>" class="attachment-full size-full wp-post-image" alt="" sizes="100vw">
		<?php //echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light ">Comunicados</h1>
		 	<h1 class="titulo-bold-dos">de prensa</h1>
		</div>	
	</div>
	<div class="container">
		<?php   
		    while ( have_posts() ) : the_post();
		?>
		<div class="center margintit">
			<h3><?php the_title(); ?></h3>
			<div class="linea-roja"></div>
		</div>
		<div>
			<?php the_content(); ?>
		</div>
		<div class="btnvermas"><a class="btn-vermas" href="<?php echo get_site_url(); ?>/usa-outlook"><span class="texto-btn">Volver</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
		<?php
		    endwhile; // End of the loop.
		?>

	</div>
</div>
<?php get_footer();