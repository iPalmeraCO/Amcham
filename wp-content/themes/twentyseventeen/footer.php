<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.2
 */

?>

		</div><!-- #content -->
		<footer class="ftr_footer">
			<div class="container ftr_cont_all">

				<div class="ftr_cont_redes">
					<h3>Síganos en redes</h3>
					<div class="ftr_cont_redes_all">
						<a href="https://www.facebook.com/amchamguate/"><i style="font-size: 24px;" class="fa fa-facebook" aria-hidden="true"></i></a>
						<a href="https://twitter.com/AmchamGT"><i style="font-size: 26px;" class="fa fa-twitter" aria-hidden="true"></i></a>
						<a href="https://www.youtube.com/user/AmChamguate"><i style="font-size: 25px;" class="fa fa-youtube-play" aria-hidden="true"></i></a>
						<a href="https://gt.linkedin.com/company/amcham-guatemala"><i style="font-size: 27px;" class="fa fa-linkedin" aria-hidden="true"></i></a>
						<a href="#"><i style="font-size: 25px;" class="fa fa-instagram" aria-hidden="true"></i></a>
					</div>
				</div>

				<div class="ftr_line"></div>

				<div class="ftr_cont_info">
					<h3>Atención al cliente</h3>
					<p><span style="font-weight: 700; color: #2e4061;">Dirección</span> | Europlaza Business Center 5ta. Avenida 5-55 Torre 1 <br>Nivel 5 Oficina 502, Guatemala 01014 </p>
					<p><span style="font-weight: 700; color: #2e4061;">Teléfono</span> |  (+502) 2417-0800 </p>
					<p><span style="font-weight: 700; color: #2e4061;">Correo</span> | ejemplo@ejemplo.com</p>
				</div>

				<div class="ftr_cont_logo">
					<div class="ftr_logo">
						<?php the_custom_logo(); ?>
					</div>
					<p>consectetur adipisicing elit. Dolore	est recusandae voluptas autem, vitae nulla soluta possimus simillique ipsam, eveniet mollitia quaerat dolores</p>
				</div>

			</div>

			<div class="ftr_cont_menu container">
				<?php wp_nav_menu( array(
				   	'theme_location' => 'footer',
				   	'menu_id'        => 'footer-menu',
				   	'container' => 'nav',
					'container_class' => 'cont_nav_footer_menu',
				   ) );
				?>
			</div>

			<div class="ftr_cont_copy">
				<p>© Copyright 2019. Todos los derechos reservados.</p>
			</div>

		</footer><!-- #colophon -->
	</div><!-- .site-content-contain -->
</div><!-- #page -->
<?php wp_footer(); ?>

</body>
</html>
