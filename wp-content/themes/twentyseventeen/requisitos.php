<?php /* Template Name: Requitos */ 
get_header(); ?>
<div class="container bread">
	<div class="cont-bread sobre-amcham">
		<a class="home" href="<?php echo get_home_url(); ?>"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Home<?php else: ?>Inicio<?php endif; ?></a>
		<span class="slash">/</span>
		<div class="home"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Membership<?php else: ?>Membresía<?php endif; ?></div>
		<span class="slash">/</span>
		<div class="home"><?php the_title(); ?></div>
	</div>
</div>
<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light tit-light-margindos"><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		</div>	
	</div>
</div>
<div class="container">
	<?php the_content(); ?>
</div>
<?php get_footer();