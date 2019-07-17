<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700,800|Source+Serif+Pro:400,600,700" rel="stylesheet">

<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style-juns.css">
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style-yeison.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php wp_head(); ?>
</head>
<script type="text/javascript">
	function formulariocontactenos(){
		pais = $('#pais').val();
		if (pais == 'Guatemala') {
			$('#formsalvador').hide();
			$('#formhonduras').hide();
			$('#formguatemala').show();
		}else if (pais == 'el-salvador') {
			$('#formhonduras').hide();
			$('#formguatemala').hide();
			$('#formsalvador').show();
		}else{
			$('#formguatemala').hide();
			$('#formsalvador').hide();
			$('#formhonduras').show();
		}
	}
	$( document ).ready(function() {
	    $('#top-menu li a').on('click', function(){
		    $('li a.activo').removeClass('activo');
		    $(this).addClass('activo');
		});
	});
</script>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<style type="text/css">

	.homek2{
		display: none;
	}
	.menuflotante .homek2 {
		display: block;
	}
	.menuflotante .homek1{
	}
	.menuflotante .navigation-top {
    background-color: white;
    box-shadow: 0px 5px 10px rgba(0,0,0,0.2);
}
.menuflotante .navigation-top a {
   
    color: #3b3d40 !important;
}
.menuflotante .items.logos img {
    height: 57px !important;
    margin-right: 10px;
}
.menuflotante .navigation-top {
  
    height: 75px !important;}
    button#btnclose {
    display: none;
}
 
 .menuflotante li#menu-item-29:before,
  .menuflotante li#menu-item-28:before,
  .menuflotante li#menu-item-27:before,
  .menuflotante li#menu-item-16:before {
  
   color:#3b3d40 !important;}
    button#btnclose {
    display: none;
} 
</style>


	<header id="header" class="site-header <?php echo $class; ?>" role="banner">

	

		<?php if ( has_nav_menu( 'top' ) ) : ?>
			<div class="navigation-top">
				<div class="container header">
					<div class="items logos" >
						<a href="<?php echo site_url();  ?>">	
						
													
							<a href="http://159.203.108.98/LandingPageAmcham/#directorios-digitales"><img src="<?php echo site_url();?>/wp-content/uploads/2018/12/GUATEMALA-1.svg" alt=""></a>
							<a href="http://159.203.108.98/LandingPageAmcham/#directorios-digitales"><img src="<?php echo site_url();?>/wp-content/uploads/2018/12/SALVADOR.svg" alt=""></a>
							<a href="http://159.203.108.98/LandingPageAmcham/#directorios-digitales"><img src="<?php echo site_url();?>/wp-content/uploads/2018/12/HONDURAS-1.svg" alt=""></a>
							

						
						</a>
					</div>
					<div class="items">
							
							<?php get_template_part( 'template-parts/navigation/navigation', 'top' ); ?>
							<div class="selector-idioma">	
								<a href="	" class="active"><img src="<?php echo site_url();?>/wp-content/uploads/2018/12/espanol.png	" alt=""></a>
								<a href="	"><img src="<?php echo site_url();?>/wp-content/uploads/2018/12/english-1.png		" alt=""></a>
							</div>	
					</div>	 
					
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">
