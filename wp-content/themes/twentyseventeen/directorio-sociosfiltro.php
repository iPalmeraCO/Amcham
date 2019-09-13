<?php /* Template Name: directorio-sociosfiltro */ 
			$current_page = $_POST["paged"];
			$paged = $current_page;
				$args  = array(
			       'cat' => $_POST["cat_slug"],
			       'post_type' => 'post',
			       'posts_per_page' =>6,
			       'orderby'=>'destacada', 
			       'order' => 'DESC', 
			       'paged' => $current_page,
			       's' => $_POST["nombre"],
			        'meta_query' => array(
						       'order_clause' => array(
						            'key' => 'destacada',
						            //'value' => '1',
						            'type' => 'NUMERIC' // unless the field is not a number
						)),
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
														<!--<p><span></span><?php echo get_post_meta($post->ID, 'actividad', true); ?></p>-->
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
					      		<div class="imagencircu"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?>
					      			<?php if (get_post_meta($post->ID, 'destacada', true) != 0): ?>
					      			<img src="<?= site_url() ?>/wp-content/uploads/2019/09/estrella-con-fondo.svg" class="imgdest">
					      			<?php endif; ?>
					      		</div>
					      		<div class="contentcircu">
					      			<h3><?php the_title(); ?></h3>
					      			<div class="datsocios"><?php //the_excerpt(); ?>
					      				<p><i class="fas fa-map-marker-alt"></i><span class="texto-azul-claro">Dirección: </span><?php echo get_post_meta($post->ID, 'direccion', true); ?></p>
										<p><i class="fas fa-phone"></i><span class="texto-azul-claro">Teléfono:   </span><?php echo get_post_meta($post->ID, 'telefono', true); ?></p>
										<!--<p><i class="fas fa-cog"></i><?php echo get_post_meta($post->ID, 'actividad', true); ?></p>-->
					      			</div>
					      			<?php if (get_post_meta($post->ID, 'destacada', true) != 0): ?>
					      				<div class="btnvermas"><a class="btn-vermas" data-toggle="modal" href="#modal-<?php echo get_the_ID(); ?>"><span class="texto-btn">Ver más</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
					      			<?php endif; ?>
					      		</div>
					      	</div>
					    <?php }
					    if(($contador % 2)== 0) { ?>
					    	<div class="col-md-6 marginevent margincircutop" id="d<?= $post->ID; ?>">
					      		<div class="imagencircu"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?>
					      			<?php if (get_post_meta($post->ID, 'destacada', true) != 0): ?>
					      			<img src="<?= site_url() ?>/wp-content/uploads/2019/09/estrella-con-fondo.svg" class="imgdest">
					      			<?php endif; ?>
					      		</div>
					      		<div class="contentcircu">
					      			<h3><?php the_title(); ?></h3>
					      			<div class="datsocios"><?php //the_excerpt(); ?>
					      				<p><i class="fas fa-map-marker-alt"></i><span class="texto-azul-claro">Dirección: </span><?php echo get_post_meta($post->ID, 'direccion', true); ?></p>
										<p><i class="fas fa-phone"></i><span class="texto-azul-claro">Teléfono:   </span><?php echo get_post_meta($post->ID, 'telefono', true); ?></p>
										<!--<p><i class="fas fa-cog"></i><?php echo get_post_meta($post->ID, 'actividad', true); ?></p>-->
					      			</div>
					      			<?php if (get_post_meta($post->ID, 'destacada', true) != 0): ?>
					      				<div class="btnvermas"><a class="btn-vermas" data-toggle="modal" href="#modal-<?php echo get_the_ID(); ?>"><span class="texto-btn">Ver más</span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
					      			<?php endif; ?>
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
			              
			                 echo '<li><a class="prevconta" onclick="filter_posts_by_category(1,'.$n.')"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';
			                          
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
			              
			                 echo "<li class='".$class." element'><a onclick='filter_posts_by_category(1,".$cont.")'>".$cont."</a></li>";
			             
			              $cont ++;
			            }
			            if ($paged != $total_pages){
			              $n = $paged + 1;
			              
			                  echo '<li><a class="nextconta" onclick="filter_posts_by_category(1,'.$n.')"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
			              
			              
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
