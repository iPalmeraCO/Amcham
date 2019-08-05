<?php /* Template Name: Nuestroscomites */ 

get_header(); ?>

<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light tit-light-margin"><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		 </div>
		 <div class="containerbannercomites cajablanca paddingcomites">
		 	<?php echo get_post_meta($post->ID, 'textobanner', true); ?>		 	
		  </div>

		 
	</div>
	
			<div class="container containerpages2">
				<?php the_content(); ?>
			</div>
		
</div><!-- #primary -->

<?php
get_footer();
