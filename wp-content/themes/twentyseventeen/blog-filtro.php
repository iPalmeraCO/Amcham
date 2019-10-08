<?php /* Template Name: blog-filtro */ 



			$current_page = $_POST["paged"];
			$paged = $current_page;
				$args  = array(
			       'cat' => $_POST["cat_slug"],
			       'post_type' => 'post',
			       'lang' => "es,en",
			       'posts_per_page' =>6,
			       'order' => 'DESC',
			       'paged' => $paged,
			       's' => $_POST["nombre"]
				);
				
				$r = new WP_Query($args); ?>
			   	<div class="contenttot">
			   	<?php
			   		$contador = 1;
			   		$boxrow = '';
			        while ($r->have_posts()): $r->the_post(); ?>
        				<?php if(($contador % 2)!= 0) { ?>
					      <div class="row">
					      	<?php $boxrow = 'abierto'; ?>
					      	<div class="col-md-6 margincircutop paddingoutl cont_blog_all">
					      		<div class="imagenblog imgusa">
								  <div class="fecha-blog"><p><?php the_time('Y-m-d') ?></p></div>
								  <?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?>
								</div>

					      		<div class="contentcircu cont_txt_blog">
					      			<h3><?php the_title(); ?></h3>
					      			<p class="cont_txt_exerp"><?php the_excerpt(); ?></p>
					      			<div class="btnvermas btnvermasdos btn_blog">
					      				<a class="btn-vermas"  href="<?php echo get_permalink(); ?>"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>View more<?php else: ?>Ver más<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">+</span></a>
					      			</div>
					      		</div>
					      	</div>
					    <?php }
					    if(($contador % 2)== 0) { ?>
					    	<div class="col-md-6 marginusatop paddingoutl cont_blog_allb">
					      		<div class="imagenblog imgusa imgusa2">
								  <div class="fecha-blog"><p><?php the_time('Y-m-d') ?></p></div>
								  <?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?>
								</div>

					      		<div class="contentcircu cont_txt_blog">
					      			<h3><?php the_title(); ?></h3>
					      			<p class="cont_txt_exerp"><?php the_excerpt(); ?></p>
					      			<div class="btnvermas btnvermasdos btn_blog">
										<a class="btn-vermas"  href="<?php echo get_permalink(); ?>"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>View more<?php else: ?>Ver más<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">+</span></a>
									</div>
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
			              
			                 echo '<li><a class="prevconta" onclick="filter_posts_by_category_blog(1,'.$n.')"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';
			                          
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
			              
			                 echo "<li class='".$class." element'><a onclick='filter_posts_by_category_blog(1,".$cont.")'>".$cont."</a></li>";
			             
			              $cont ++;
			            }
			            if ($paged != $total_pages){
			              $n = $paged + 1;
			              
			                  echo '<li><a class="nextconta" onclick="filter_posts_by_category_blog(1,'.$n.')"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
			              
			              
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
