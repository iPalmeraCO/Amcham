<?php /* Template Name: staff-filtros */ 

	$args = array(
    'post_status' => 'publish',
    'posts_per_page'  => -1,
	'orderby'          => 'date',
	'order'            => 'ASC',
    'tax_query'   => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'slug',
            'terms'    => $_POST["cat_slug"],					            
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
					<img src="<?php echo $featured_img_url; ?>" onmouseover="this.src='<?php echo get_post_meta($post->ID, 'imagendos', true); ?>'" onmouseout="this.src='<?php echo $featured_img_url; ?>'" class="imgjunta">
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
				 	