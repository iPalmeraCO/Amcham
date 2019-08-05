<?php /* Template Name: SoloBanneralignrightandlefft */ 
get_header(); ?>
<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits alleft">
		 	<h1 class="tit1 titulo-light tit-light-margindos"><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		</div>	
	</div>
</div>
<div class="container">
	<?php the_content(); ?>
</div>
<?php get_footer();