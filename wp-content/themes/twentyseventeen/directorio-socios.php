<?php /* Template Name: Directorio de socios */ 
get_header(); ?>
<div id="primary" class="content-area">
	<!-- <div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light tit-light-margin"><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
	</div>	 -->

	
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

		      define("DIRECTORIODESOSCIOS",10);
		      $args = array('child_of' => DIRECTORIODESOSCIOS, 'lang' => 'en,es');
			  $subcategories = get_categories( $args );
		    ?>
		</div>
		<div>
			<div class="filtros row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<h3>Búsqueda por Categoría</h3>					
					<select name="categoria" id="categoria">
								<option value="directoriosocios">Todas</option>
						<?php foreach($subcategories as $category): ?>
								<option value="<?= $category->cat_ID ?>"><?= $category->name ?> </option>
						<?php endforeach; ?>
					</select>
				</div>	
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<h3>Búsqueda por nombre o palabra clave</h3>
					<input type="text" name="nombre" id="nombre">
				</div>	
				<div class="row center w100 contbuscar">					
						<a class="btn-vermas" onclick="filter_posts_by_category(99,1,1)" style="margin: 0px auto">BUSCAR</a>	
				</div>
			</div>

			<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args  = array(
			       'cat' => DIRECTORIODESOSCIOS,
			       'post_type' => 'post',
			       'posts_per_page' =>6,
			       'lang' => 'en,es',
			       'orderby'=>'destacada', 
			       'order' => 'desc', 
			       'paged' => $paged,
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
									      				<p><span class="texto-azul-claro">Dirección:  </span><?php echo get_post_meta($post->ID, 'direccion', true); ?></p>
														<p><span class="texto-azul-claro">Teléfono:  </span><?php echo get_post_meta($post->ID, 'telefono', true); ?></p>														
									      			</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
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
										<p><i class="fas fa-envelope"></i><span class="texto-azul-claro">Email:   </span><?php echo get_post_meta($post->ID, 'email', true); ?></p>
										<p><i class="fas fa-globe"></i><span class="texto-azul-claro">Web:   </span><a target="_blank" href="<?php echo get_post_meta($post->ID, 'web', true); ?>"><?php echo get_post_meta($post->ID, 'web', true); ?></a></p>
										<p><i class="fas fa-bookmark"></i><span class="texto-azul-claro">Marcas:   </span><?php echo get_post_meta($post->ID, 'marcas', true); ?></p>
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
										<p><i class="fas fa-envelope"></i><span class="texto-azul-claro">Email:   </span><?php echo get_post_meta($post->ID, 'email', true); ?></p>
										<p><i class="fas fa-globe"></i><span class="texto-azul-claro">Web:   </span><a target="_blank" href="<?php echo get_post_meta($post->ID, 'web', true); ?>"><?php echo get_post_meta($post->ID, 'web', true); ?></a></p>
										<p><i class="fas fa-bookmark"></i><span class="texto-azul-claro">Marcas:   </span><?php echo get_post_meta($post->ID, 'marcas', true); ?></p>
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
			              
			                echo '<li><a class="prevconta" onclick="filter_posts_by_category(-1,'.$n.')"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';
			                          
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
			              
			                 echo "<li class='".$class." element'><a onclick='filter_posts_by_category(-1,".$cont.")'>".$cont."</a></li>";
			             
			              $cont ++;
			            }
			            if ($paged != $total_pages){
			              $n = $paged + 1;
			              
			                echo '<li><a class="nextconta" onclick="filter_posts_by_category(-1,'.$n.')"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
			               //echo '<li><a class="nextconta" onclick="pagination()" <i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
			              
			              
			            } else {
			              // echo '<li><a class="next page-numbers" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
			            }
			            echo '</ul></div>';
			          }
			        }         	
      
			 ?>
			   	</div>
			   	
		</div>
	</div>
<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Trigger modal</a> -->
</div> 

<script type="text/javascript">
    jQuery(document).ready(function(){
       
       
        //filter_posts_by_category('all', 1);
       
    });

  
   
   
    var filter_posts_by_category = function(cat, npag,tip){
    	//Filtrar todos
    	if (tip  === undefined ){    		
    		$(window).scrollTop($('.sliderempresa').offset().top);    		
    	} 
    	

    	var cat_slug = "directoriosocios";  
    	var nombre = "";
    	if (cat != -1){
			cat_slug = $("#categoria").val();
			nombre   = $("#nombre").val(); 
    	} 
        var ajax_url = '<?= site_url(); ?>'+'/wp-admin/admin-ajax.php';
       	
        var total_posts = -1; // -1 for show all posts
       
        var data = {
            'action'    : 'filter_posts_by_category',
            'cat_slug'    : cat_slug,
            'nombre'      : nombre,
            'paged'       : npag
        };
       
        jQuery.ajax({
            method:"POST",
            url: ajax_url,
            data: data,
            beforeSend : function(){
           
            },
            success: function(result){
                jQuery('.contenttot').html(result);
            },
            error: function(xhr,status,error){
                // console.log(error);
            }
        });
    }
   
    </script>

<?php get_footer();