<?php /* Template Name: Sobreamcham */ 

get_header(); ?>

<div id="primary" class="content-area">
	<div class="container bread">
		<div class="cont-bread sobre-amcham">
			<a class="home" href="<?php echo get_home_url(); ?>"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Home<?php else: ?>Inicio<?php endif; ?></a>
			<span class="slash">/</span>
			<div class="home"><?php the_title(); ?></div>
		</div>
	</div>
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?><?php echo get_post_meta($post->ID, 'titulobanner1en', true); ?><?php else: ?><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?><?php endif; ?></h1>
		 	<h1 class="titulo-bold-dos"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?><?php echo get_post_meta($post->ID, 'titulobanner2en', true); ?><?php else: ?><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?><?php endif; ?></h1>
		 </div>
		 <div class="containerbanner cajablanca padding1">
		 	<?php echo get_post_meta($post->ID, 'textobanner', true); ?>		 	
		  </div>

		 
	</div>
	
			<div class="container containerpagessobreamcham">
				<?php the_content(); ?>
			</div>
		
</div><!-- #primary -->

<?php
get_footer();
