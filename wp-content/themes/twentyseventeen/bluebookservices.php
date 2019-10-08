<?php /* Template Name: BlueBookservices */ 

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
