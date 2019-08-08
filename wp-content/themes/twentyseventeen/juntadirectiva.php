<?php /* Template Name: Juntadirectiva */ 

get_header(); ?>

<!-- <div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light"><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		 </div>
		 

		 
	</div> -->
	
			<div class="container margincinco">
				<h1 class="titulo-bold-dos">Junta</h1>
				<div class="linea-roja lineajunta"></div>
				<h1 class="titulo-bold-dos tit2junta">Directiva</h1>



				<div class="containerjunta">
				<?php 
					$args = array(
					    'post_status' => 'publish',
					    'tax_query'   => array(
					        array(
					            'taxonomy' => 'category',
					            'field'    => 'slug',
					            'terms'    => 'juntadirectiva'
					        )
					    ) 
					);
					$columna = 1;
					$query = new WP_Query( $args );
					$contador = 1;

					while ($query->have_posts()) :  $query->the_post();
						
						if ($columna == 1) {
						?>
						
						<div class="row">
						<?php } ?>
							
						<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 singlejunta">

							<?php switch ($contador) {
								case '3': ?>
									<div class="contderjun"></div>
								<?php	break;
								
								default:
									# code...
									break;
							}?>
							<div class="csjunta">
								<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
								<img src="<?php echo $featured_img_url; ?>" class="imgjunta">
								<div class="datossinglejunta alcenter">
									<h3> <?php the_title(); ?> </h3>
									<p>  <?php echo get_post_meta($post->ID, 'cargo', true); ?> </p>
									<p>  <?php echo get_post_meta($post->ID, 'cargo2', true); ?> </p>
								</div>
							</div>
						</div>

						<?php if ($columna == 3) { ?>
						</div>
						<?php $columna = 0;
						} ?>

					<?php 
						$columna  = $columna + 1;
						$contador = $contador+1;
						endwhile;

						if ($columna != 1){ ?>
						</div>
						<?php } ?>
					</div>
				 	<div class="containerstaff">
				 		<div class="titsstaff">
					 		<h1 class="titulo-bold-dos">Amcham</h1>
					 		<div class="linea-roja lineastaff"></div>
							<h1 class="titulo-bold-dos tit2staff">Staff</h1>
						</div>
				 		
				 		<?php 
						$args = array(
					    'post_status' => 'publish',
					    'posts_per_page'  => -1,
						'orderby'          => 'date',
						'order'            => 'ASC',
					    'tax_query'   => array(
					        array(
					            'taxonomy' => 'category',
					            'field'    => 'slug',
					            'terms'    => 'staff',					            
					        ), 
						    )
						);
						$columna = 1;
						$query = new WP_Query( $args );


					while ($query->have_posts()) :  $query->the_post();
						
						if ($columna == 1) {
						?>
						
						<div class="row">
						<?php } ?>
							
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 singlestaff">
							<div class="csstaff alcenter">
								<?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
								<img src="<?php echo $featured_img_url; ?>" class="imgjunta">
								<div class="datossinglestaff">
									<h3> <?php the_title(); ?> </h3>
									<p>  <?php echo get_post_meta($post->ID, 'cargo', true); ?> </p>
									
								</div>
							</div>
						</div>

						<?php if ($columna == 4) { ?>
						</div>
						<?php $columna = 0;
						} ?>

						<?php 
						$columna = $columna + 1;
						endwhile;

						if ($columna != 1){ ?>
						</div>
						<?php } ?>

				 	</div>
				 </div>
			</div>
		
</div><!-- #primary -->

<?php
get_footer();
