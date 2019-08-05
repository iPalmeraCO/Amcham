<?php /* Template Name: Directorio de socios */ 
get_header(); ?>
<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light tit-light-margin"><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		</div>	
		<!-- <div class="containerbanner cajablanca padding1yj">
		 	<?php //echo get_post_meta($post->ID, 'textobanner', true); ?>		 	
		</div>  -->
	</div>
	<!-- <div class="container linea-roja linerojacirculo"></div> -->
	<div class="container ">
		<div class="contentsocios">
			<?php   
		      while ( have_posts() ) : the_post();
		        the_content();
		      endwhile; // End of the loop.
		    ?>
		</div>
		<div>
			<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args  = array(
			       'cat' => 10,
			       'post_type' => 'post',
			       'posts_per_page' =>6,
			       'orderby'=>'date', 
			       'order' => 'DESC', 
			       'paged' => $paged
				);
				$r = new WP_Query($args); ?>
			   	<div class="contenttot">
			   	<?php
			   		$contador = 1;
			   		$boxrow = '';
			        while ($r->have_posts()): $r->the_post(); ?>
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
													<p><?php the_content(); ?></p>
												</div>
												
												<div class="contactomodal">
													<div class="datsocios">
									      				<p><span></span><?php echo get_post_meta($post->ID, 'direccion', true); ?></p>
														<p><span></span><?php echo get_post_meta($post->ID, 'telefono', true); ?></p>
														<p><span></span><?php echo get_post_meta($post->ID, 'actividad', true); ?></p>
									      			</div>
												</div>
											</div>
										</div>
									</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div><!-- /.modal -->
        				<?php if(($contador % 2)!= 0) { ?>
					      <div class="row">
					      	<?php $boxrow = 'abierto'; ?>
					      	<div class="col-md-6 margincircutop" id="d<?= $post->ID; ?>">
					      		<div class="imagencircu"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
					      		<div class="contentcircu">
					      			<h3><?php the_title(); ?></h3>
					      			<div class="datsocios"><?php //the_excerpt(); ?>
					      				<p><span></span><?php echo get_post_meta($post->ID, 'direccion', true); ?></p>
										<p><span></span><?php echo get_post_meta($post->ID, 'telefono', true); ?></p>
										<p><span></span><?php echo get_post_meta($post->ID, 'actividad', true); ?></p>
					      			</div>
					      			<div class="btnvermas"><a class="btn-vermas" data-toggle="modal" href="#modal-<?php echo get_the_ID(); ?>"><span class="texto-btn">Ver más</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
					      		</div>
					      	</div>
					    <?php }
					    if(($contador % 2)== 0) { ?>
					    	<div class="col-md-6 marginevent margincircutop" id="d<?= $post->ID; ?>">
					      		<div class="imagencircu"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
					      		<div class="contentcircu">
					      			<h3><?php the_title(); ?></h3>
					      			<div class="datsocios"><?php //the_excerpt(); ?>
					      				<p><span></span><?php echo get_post_meta($post->ID, 'direccion', true); ?></p>
										<p><span></span><?php echo get_post_meta($post->ID, 'telefono', true); ?></p>
										<p><span></span><?php echo get_post_meta($post->ID, 'actividad', true); ?></p>
					      			</div>
					      			<div class="btnvermas"><a class="btn-vermas" data-toggle="modal" href="#modal-<?php echo get_the_ID(); ?>"><span class="texto-btn">Ver más</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
					      		</div>
					      	</div>
					      </div>
					      <?php $boxrow = 'cerrado'; ?>
					    <?php } ?>     				
        			<?php $contador++;
        			endwhile; 
        			if($boxrow == 'abierto') { ?>
        				</div>
					<?php }
        			?>

			   	</div>
			   	<?php
        			// paginador
        			$total_pages = $r->max_num_pages;
        			if ($total_pages > 1){
        				$current_page = $paged;
          				$big = 999999999; // need an unlikely integer
				        $links= paginate_links(array(
				            'base'    => str_replace( $big, '%#%', get_pagenum_link( $big )),
				            'format'  => '?paged=%#%',
				            'current' => $current_page,
				            'total' => $total_pages,
				            'prev_text' => __('«'),
				            'prev_next' => false,                     
				            'next_text' => __('»'),
				            'type'  => 'array'
				        ));
          				if( is_array( $links ) ) {
            				echo '<div class="boxpag"><ul class="container contaipaginat">';
			            if ($paged != 1){        
			              $n = $paged - 1;      
			              
			                echo '<li><a class="prevconta" href="'.get_site_url()."/circulo-de-liderazgo/page/".$n.'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';
			                          
			            } else {
			              // echo '<li><a class="prev page-numbers" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';              
			            }
			            $cont = 1;
			            $class= "bulletactive";
			            foreach ( $links as $page ) {                
			              if ($cont == $paged){
			                $class = "bulletactive";
			              } else {
			                $class = "";
			              }
			              
			                 echo "<li class='".$class." element'><a href='".get_site_url()."/circulo-de-liderazgo/page/".$cont."'>".$cont."</a></li>";
			             
			              $cont ++;
			            }
			            if ($paged != $total_pages){
			              $n = $paged + 1;
			              
			                echo '<li><a class="nextconta" href="'.get_site_url()."/circulo-de-liderazgo/page/".$n.'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
			              
			              
			            } else {
			              // echo '<li><a class="next page-numbers" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
			            }
			            echo '</ul></div>';
			          }
			        }
          	
        			// fin paginador

       //  		else:
   				// 	echo "No se encontaron patrocinadores";
   				// endif;
			 ?>
		</div>
	</div>
<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a> -->
</div> 
<?php get_footer();