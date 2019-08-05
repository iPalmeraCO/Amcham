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
<link href="https://fonts.googleapis.com/css?family=Anton|Source+Sans+Pro:300,400,600,700,900&display=swap" rel="stylesheet">

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

				<!-- IDIOMAS -->
				<div class="items">
					<span class="selector-idioma">	
						<a href="" class="active">ES</a>
						<span>/</span>
						<a href="">EN</a>
					</span>	
					<a href="#" class="login">Login</a>
				</div>	 
				<!-- FIN IDIOMAS -->

				<div class="container header">

					<!-- <div class="items logos" >
						<a href="<?php //echo site_url();  ?>">	
							<a href="http://159.203.108.98/LandingPageAmcham/#directorios-digitales">dir-digitales</a>
							<a href="http://159.203.108.98/LandingPageAmcham/#directorios-digitales">salvador</a>
							<a href="http://159.203.108.98/LandingPageAmcham/#directorios-digitales">honduras</a>
						</a>
					</div> -->

					<!-- FIN BARRA SUPERIOR  -->
        			<div class="cont_menu_redes_srch">

							<div class="logo">
								<?php the_custom_logo(); ?>
        					</div>
							
							<input name="ActivaMenu" id="ActivaMenu" type="checkbox" />
							<label class="botones azul" id="AbreMenu" for="ActivaMenu"><div class="menu_text">MENU</div></label>
							
							<div class="cont_menu_resposive">
							<label id="AbreMenu" for="ActivaMenu"><div class="menu_text">X</div></label>

							<div class="buscador resp_search"><?php get_search_form(); ?></div>

						   	<?php wp_nav_menu( array(
							   	'theme_location' => 'top',
							   	'menu_id'        => 'top-menu',
							   	'container' => 'nav',
								'container_class' => 'cont_nav_top_menu',
							   ) );
							?>

							<div class="contact_resp">
							<?php wp_nav_menu( array(
								'theme_location' => 'contacto',
								'menu_id'        => 'top-contacto',
								'container' => 'nav',
								'container_class' => 'cont_nav_top_cont',
								) ); 
							
							?>

							<div class="h_cont_redes resp_red">
								<a href="https://www.facebook.com/amchamguate/"><img src="http://localhost/general/wp-content/uploads/2019/07/face.png" alt=""></a>
								<a href="https://twitter.com/AmchamGT"><img src="http://localhost/general/wp-content/uploads/2019/07/twitter.png" alt=""></a>
								<a href="https://www.youtube.com/user/AmChamguate"><img src="http://localhost/general/wp-content/uploads/2019/07/youtube.png" alt=""></a>
								<a href="https://gt.linkedin.com/company/amcham-guatemala"><img src="http://localhost/general/wp-content/uploads/2019/07/linked.png" alt=""></a>
								<a href="#"><img src="http://localhost/general/wp-content/uploads/2019/07/instagram.png" alt=""></a>
							</div>
							</div>
							</div>

						   <div class="cont_all_search_contac">
							   <div class="cont_contact_redes">
									<?php wp_nav_menu( array(
									'theme_location' => 'contacto',
									'menu_id'        => 'top-contacto',
									'container' => 'nav',
									'container_class' => 'cont_nav_top_cont',
									) ); ?>
								<!-- REDES -->
								<div class="h_cont_redes">
									<a href="#"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/face.png" alt=""></a>
									<a href="#"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/twitter.png" alt=""></a>
									<a href="#"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/youtube.png" alt=""></a>
									<a href="#"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/linked.png" alt=""></a>
									<a href="#"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/instagram.png" alt=""></a>
								</div>
							   </div>
							   <!-- FIN REDES -->
							  <div class="buscador"><?php get_search_form(); ?></div>
						   </div>

					</div>
         			<!-- BARRA NAVEGACION -->
					
				</div><!-- .wrap -->
			</div><!-- .navigation-top -->
		<?php endif; ?>

	</header><!-- #masthead -->

	<div class="site-content-contain">
		<div id="content" class="site-content">
