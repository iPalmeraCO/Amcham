<?php 
get_header();?>
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
		<?php
		    endwhile; // End of the loop.
		?>

	</div>
</div>
<?php get_footer();