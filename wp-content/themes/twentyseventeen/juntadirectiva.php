<?php /* Template Name: Juntadirectiva */ 

get_header(); ?>
<style type="text/css">
@media screen and (min-width: 575px){
	.fstaff {
		position: absolute;
		bottom: 25%;
	}
}
</style>

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
					    'posts_per_page' => '55',
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
				 		<div class="row">
					 		<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						 		<div class="titsstaff">
							 		<h1 class="titulo-bold-dos">Amcham</h1>
							 		<div class="linea-roja lineastaff"></div>
									<h1 class="titulo-bold-dos tit2staff">Staff</h1>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
								<?php 
								
								define("CATEGORYSTAFF",4);
				      			$args = array('child_of' => CATEGORYSTAFF);
					  			$subcategories = get_categories( $args );
					  			
					  			?> 
								<div class="filtrostaff fstaff"> 
									<select name="categoria" id="categoria" onchange="filter_posts_staff()">
										<option value="staff">Todas</option>
										<?php foreach($subcategories as $category): ?>
												<option value="<?= $category->slug ?>"><?= $category->name ?> </option>
										<?php endforeach; ?>
									</select>
								</div>	    
					 		</div>
				 		</div>
				 		<div class="contstaff">
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
				 	</div>
				 </div>
			</div>
		
</div><!-- #primary -->
<script type="text/javascript">
   
    var filter_posts_staff = function(){    	
    	
        var ajax_url = '<?= site_url(); ?>'+'/wp-admin/admin-ajax.php';       	        
       
        var data = {
            'action'    : 'filter_posts_staff',
            'cat_slug'    : $("#categoria").val(),          
        };
       
        jQuery.ajax({
            method:"POST",
            url: ajax_url,
            data: data,
            beforeSend : function(){
           
            },
            success: function(result){
                jQuery('.contstaff').html(result);
            },
            error: function(xhr,status,error){
                // console.log(error);
            }
        });
    }
   
    </script>

<?php
get_footer();
