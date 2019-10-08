<?php /* Template Name: Juntadirectiva */ 

get_header(); ?>
<div class="container bread">
		<div class="cont-bread sobre-amcham">
			<a class="home" href="<?php echo get_home_url(); ?>"><?php
				$currentlang = get_bloginfo('language');
				if($currentlang=="en-US"):?>Home<?php else: ?>Inicio<?php endif; ?></a>
			<span class="slash">/</span>
			<div class="home"><?php the_title(); ?></div>
		</div>
	</div>
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
				<?php
				$currentlang = get_bloginfo('language');
				if($currentlang=="en-US"):?>
				<h1 class="titulo-bold-dos">Board of</h1>
				<div class="linea-roja lineajunta"></div>
				<h1 class="titulo-bold-dos tit2junta">Directors</h1>
				<?php else: ?>
				<h1 class="titulo-bold-dos">Junta</h1>
				<div class="linea-roja lineajunta"></div>
				<h1 class="titulo-bold-dos tit2junta">Directiva</h1>
				<?php endif; ?>



				<div class="containerjunta">
				<?php 
					$args = array(
					    'post_status' => 'publish',
					    'lang' => 'en,es',
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
						<div class="modal fade" id="modal-<?php echo get_the_ID(); ?>">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-headerd">
										<button type="button" class="cerrarmodal" data-dismiss="modal" aria-hidden="true">&times;</button>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-md-6">
												<div class="imgmodalcircu"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
											</div>
											<div class="col-md-6">
												<div class="lineagris"></div>
												<div class="contenidomodal">
													<h3><?php the_title(); ?></h3>
													<div class="rojacorta"></div>
													<p style="margin-bottom: 0px; color: #1f5b93;"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?><?php echo get_post_meta($post->ID, 'cargo-us', true); ?><?php else: ?><?php echo get_post_meta($post->ID, 'cargo', true); ?><?php endif; ?></p>
													<p style="margin: 0px !important; padding: 0px !important;">  <?php echo get_post_meta($post->ID, 'cargo2', true); ?> </p>
													<p><?php the_content(); ?></p>
												</div>
												
												<div class="">
														<p>  <?php echo get_post_meta($post->ID, 'bio-junta', true); ?> </p>
													<div class="datsocios">
														<p style="margin-top: 20px; margin: 0px !important;padding: 0px !important;color: #737373;font-weight: 600;line-height: 23px;font-size: 17px;">  <?php echo get_post_meta($post->ID, 'correo-junta', true); ?> </p>
									      			</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
							
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
								<a data-toggle="modal" href="#modal-<?php echo get_the_ID(); ?>"><span class="texto-btn">
									<div class="datossinglejunta alcenter">
										<h3> <?php the_title(); ?> </h3>
										<p> 
										<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?><?php echo get_post_meta($post->ID, 'cargo-us', true); ?><?php else: ?><?php echo get_post_meta($post->ID, 'cargo', true); ?><?php endif; ?>
										</p>
										<p>  <?php echo get_post_meta($post->ID, 'cargo2', true); ?> </p>
									</div>
								</a>
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
								$currentlang = get_bloginfo('language');
								if($currentlang=="en-US"){
									define("CATEGORYSTAFF",193);
								}
								else{
									define("CATEGORYSTAFF",4);
								}
				      			$args = array('child_of' => CATEGORYSTAFF,'lang' => 'en,es');
					  			$subcategories = get_categories( $args );
					  			
					  			?> 
								<div class="filtrostaff fstaff"> 
									<select name="categoria" id="categoria" onchange="filter_posts_staff()">
										<option value="staff"><?php
										$currentlang = get_bloginfo('language');
										if($currentlang=="en-US"):?>
										All
										<?php else: ?>
										Todas
										<?php endif; ?></option>
										<?php foreach($subcategories as $category): ?>
												<option value="<?= $category->slug ?>"><?= $category->name ?> </option>
										<?php endforeach; ?>
									</select>
								</div>	    
					 		</div>
				 		</div>
				 		<div class="contstaff">
				 		<?php
						$currentlang = get_bloginfo('language');
						if($currentlang=="en-US"){
							$args = array(
						    'post_status' => 'publish',
						    'lang' => 'en,es',
						    'posts_per_page'  => -1,
							'orderby'          => 'date',
							'order'            => 'ASC',
						    'tax_query'   => array(
						        array(
						            'taxonomy' => 'category',
						            'field'    => 'slug',
						            'terms'    => 'staff-us',					            
						        ), 
							    )
							);
						}
						else{
							$args = array(
						    'post_status' => 'publish',
						    'lang' => 'en,es',
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
						} 
						
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
											<p>
												<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?><?php echo get_post_meta($post->ID, 'cargo2', true); ?><?php else: ?><?php echo get_post_meta($post->ID, 'cargo', true); ?><?php endif; ?>
											</p>
											
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
