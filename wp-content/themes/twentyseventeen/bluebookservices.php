<?php /* Template Name: BlueBookservices */ 

get_header(); ?>

<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits alcenter w100">
		 	<h1 class="tit1 titulo-light tlar"><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		 </div>
		 <div class="containerbannerbusiness leftblue cajablanca paddingbusiness">
		 	<?php echo get_post_meta($post->ID, 'textobanner', true); ?>		 	
		  </div>


		 
	</div>
	
			<div class="container mtop7">				
				<?php the_content(); ?>				
			</div>
		
</div><!-- #primary -->

<?php
get_footer();
