<?php 
get_header();?>
<div id="" class="content-area">
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
		<br>
		<div class="btnvermas"><a class="btn-vermas" onclick="window.history.back();"><span class="texto-btn">Volver</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
		<?php
		    endwhile; // End of the loop.
		?>
		<br><br>
	</div>
</div>
<?php get_footer();