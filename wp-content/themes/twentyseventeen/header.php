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
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/style-charles.css">

<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/bootstrap/bootstrap.min.js" ></script>
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


	window.addEventListener("load", function () {
    const loader = document.querySelector(".loader");
    loader.className += " nover"; // class "loader hidden"
});

</script>
<body <?php body_class(); ?>>

<!-- <div class="loader">
	<img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/09/logo-part-1.png" alt="Loading..." class="loader-1" />
	<img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/09/logo-part-2.png" alt="Loading..." />
	<div class="load_line"></div>
</div> -->




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

<header id="header" class="site-header" role="banner">

	<script>
	jQuery(document).ready(function($){
		if ($(window).width() <= 767) {
		    $(".menu-item-has-children").append("<div class='open-menu-link open'>+</div>");
		    $('.menu-item-has-children').append("<div class='open-menu-link close'>-</div>");
		
		    $('.open').addClass('visible');
		
		    $('.open-menu-link').click(function(e){
		        var childMenu =  e.currentTarget.parentNode.children[1];
		        if($(childMenu).hasClass('visible')){
		            $(childMenu).removeClass("visible");
					$(childMenu).addClass('invisible');

		            $(e.currentTarget.parentNode.children[3]).removeClass("visible");
		            $(e.currentTarget.parentNode.children[2]).addClass("visible");
		            $(e.currentTarget.parentNode.children[3]).removeClass("invivisible");
		        } else {
		            $(childMenu).addClass("visible");
		            $(childMenu).removeClass("invisible");
		
		            $(e.currentTarget.parentNode.children[2]).addClass("visible");
		            $(e.currentTarget.parentNode.children[3]).removeClass("visible");
		            $(e.currentTarget.parentNode.children[2]).removeClass("invivisible");
		        }
		    });
	    }
	});
</script>

<?php if ( has_nav_menu( 'top' ) ) : ?>
	<div class="navigation-top">

		<!-- IDIOMAS -->
		<div class="items">
			<span class="selector-idioma">	
				<a href="http://142.93.201.64/Amcham/" class="active">ES</a>
				<span>/</span>
				<a href="http://142.93.201.64/Amcham/en/home">EN</a>
			</span>	
			<?php  if (is_user_logged_in()): 
					global $current_user;
      				 wp_get_current_user();	?>
      				<span class="name-user" onclick="openDropdown()"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Welcome<?php else: ?>Bienvenido<?php endif; ?> <?= $current_user->display_name; ?></span>
					<div id="myDropdown" class="dropdown-content">
						<a href="#home">Home</a>
						<a href="#about">About</a>
						<a href="#contact">Contact</a>
						</div>
      				 <script>
					/* When the user clicks on the button, 
					toggle between hiding and showing the dropdown content */
					function openDropdown() {
					  document.getElementById("myDropdown").classList.toggle("show");
					}

					// Close the dropdown if the user clicks outside of it
					window.onclick = function(event) {
					  if (!event.target.matches('.name-user')) {
					    var dropdowns = document.getElementsByClassName("dropdown-content");
					    var i;
					    for (i = 0; i < dropdowns.length; i++) {
					      var openDropdown = dropdowns[i];
					      if (openDropdown.classList.contains('show')) {
					        openDropdown.classList.remove('show');
					      }
					    }
					  }
					}
					</script>
					<a href="<?= site_url() ?>/my-account/customer-logout" class="login"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Logout<?php else: ?>Cerrar sesión<?php endif; ?></a>
			<?php  else : ?>
				<a href="<?= site_url() ?>/my-account" class="login">Login</a>
			<?php endif; ?>
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

					<div class="logo logo-mobile">
						<?php the_custom_logo(); ?>
					</div>
					
					<input name="ActivaMenu" id="ActivaMenu" type="checkbox" />
					<label class="botones azul" id="AbreMenu" for="ActivaMenu"><div class="menu_text mobile-menu"><i class="fas fa-bars"></i><span class="mobile-menu-text">Menú </span></div></label>
					
					<div class="cont_menu_resposive">
					<label id="AbreMenu" for="ActivaMenu"><div class="menu_text"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/08/cerrar.png"></div></label>

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
						<a href="https://www.facebook.com/amchamguate/"><img src="<?= site_url(); ?>/wp-content/uploads/2019/07/face.png" alt=""></a>
						<a href="https://twitter.com/AmchamGT"><img src="<?= site_url(); ?>/wp-content/uploads/2019/07/twitter.png" alt=""></a>
						<a href="https://www.youtube.com/user/AmChamguate"><img src="<?= site_url(); ?>/wp-content/uploads/2019/07/youtube.png" alt=""></a>
						<a href="https://gt.linkedin.com/company/amcham-guatemala"><img src="<?= site_url(); ?>/wp-content/uploads/2019/07/linked.png" alt=""></a>
						<a href="https://www.instagram.com/amchamgt/"><img src="<?= site_url(); ?>/wp-content/uploads/2019/07/instagram.png" alt=""></a>
					</div>
					</div>
					</div>

				   <div class="cont_all_search_contac">
					   <div class="cont_contact_redes">
							<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>
							<a href="http://142.93.201.64/Amcham/en/contact-us/" class="btn-vermas"> Contact</a>
							<?php else: ?>
							<a href="http://142.93.201.64/Amcham/contacto/" class="btn-vermas"> Contacto</a>
							<?php endif; ?>
						<!-- REDES -->
						<div class="h_cont_redes">
							<a href="https://www.facebook.com/amchamguate/"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/face.png" alt=""></a>
							<a href="https://twitter.com/AmchamGT"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/twitter.png" alt=""></a>
							<a href="https://www.youtube.com/user/AmChamguate"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/youtube.png" alt=""></a>
							<a href="https://gt.linkedin.com/company/amcham-guatemala"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/linked.png" alt=""></a>
							<a href="https://www.instagram.com/amchamgt/"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/instagram.png" alt=""></a>
						</div>
					   </div>
					   <!-- FIN REDES -->
					  <div class="buscador search-web">
						<div id="mainNavmob" class="navbar search-input collapsed">
							<form role="search" method="get" id="searchform" class="searchBox" action="<?php echo esc_url( home_url( '/' ) ); ?>">
								<label class="screen-reader-text" for="s"><?php _x( 'Search for:', 'label' ); ?></label>
								<div class="inputbuscar" style="display: inline;">
									<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>
									<input style="display: block;" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search..." class="buscador" />
									<?php else: ?>
									<input style="display: block;" type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Buscar..." class="buscador" />
									<?php endif; ?>
									<button style="display: block;" type="submit" id="searchsubmit" value="x" class="banner-text-btn"/><i class="fa fa-search" aria-hidden="true"></i></button>
								</div>
							</form>
						</div>
					</div>
				   </div>

			</div>
			 <!-- BARRA NAVEGACION -->
			
		</div><!-- .wrap -->
	</div><!-- .navigation-top -->
<?php endif; ?>

</header><!-- #masthead -->

<div class="site-content-contain">
<div id="content" class="site-content">
