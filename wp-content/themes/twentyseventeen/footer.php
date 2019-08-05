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
					<h3>Siganos en redes</h3>
					<div class="ftr_cont_redes_all">
						<a href="https://www.facebook.com/amchamguate/"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/face.png" alt=""></a>
						<a href="https://twitter.com/AmchamGT"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/twitter.png" alt=""></a>
						<a href="https://www.youtube.com/user/AmChamguate"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/youtube.png" alt=""></a>
						<a href="https://gt.linkedin.com/company/amcham-guatemala"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/linked.png" alt=""></a>
						<a href="#"><img src="http://142.93.201.64/Amcham/wp-content/uploads/2019/07/instagram.png" alt=""></a>
					</div>
				</div>

				<div class="ftr_line"></div>

				<div class="ftr_cont_info">
					<h3>Atención al cliente</h3>
					<p><span>Dirección</span> | Lorem Ipsum et dolor</p>
					<p><span>Teléfono</span> | 000-000-000</p>
					<p><span>Correo</span> | Correo@gmail.com</p>
				</div>

				<div class="ftr_cont_logo">
					<div class="ftr_logo">
						<?php the_custom_logo(); ?>
					</div>
					<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos magnam voluptate ea porro.</p>
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
