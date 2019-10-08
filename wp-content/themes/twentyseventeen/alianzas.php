<?php /* Template Name: Alianzas */ 
get_header(); ?>
<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light "><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		</div>	
	</div>
	<div class="container">
		<div>
			<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args  = array(
			       'cat' => 37,
			       'post_type' => 'post',
			       'posts_per_page' =>8,
			       'orderby'=>'date',
			       'lang' => 'en,es', 
			       'order' => 'DESC', 
			       'paged' => $paged
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
					      	<div class="col-md-6 margincircutop paddingoutl">
					      		<div class="imagencircu imgusa"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
					      		<div class="contentcircu">
					      			<h3><?php the_title(); ?></h3>
					      			<p><?php the_excerpt(); ?></p>
					      			<div class="fecha-usa"><p><?php the_time('d M, Y') ?></p></div>
					      			<div class="btnvermas btnvermasdos">
					      				<a class="btn-vermas" target="_blank" href="<?php echo get_post_meta($post->ID, 'urlsitioweb', true); ?>"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Visit website<?php else: ?>Visitar sitio web<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">+</span></a>
					      			</div>
					      		</div>
					      	</div>
					    <?php }
					    if(($contador % 2)== 0) { ?>
					    	<div class="col-md-6 marginusatop paddingoutl">
					      		<div class="imagencircu imgusa imgusa2"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
					      		<div class="contentcircu">
					      			<h3><?php the_title(); ?></h3>
					      			<p><?php the_excerpt(); ?></p>
					      			<div class="fecha-usa"><p><?php the_time('d M, Y') ?></p></div>
					      			<div class="btnvermas btnvermasdos"><a class="btn-vermas" target="_blank" href="<?php echo get_post_meta($post->ID, 'urlsitioweb', true); ?>"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Visit website<?php else: ?>Visitar sitio web<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
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
			              
			                echo '<li><a class="prevconta" href="'.get_site_url()."/alianzas/page/".$n.'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';
			                          
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
			              
			                 echo "<li class='".$class." element'><a href='".get_site_url()."/alianzas/page/".$cont."'>".$cont."</a></li>";
			             
			              $cont ++;
			            }
			            if ($paged != $total_pages){
			              $n = $paged + 1;
			              
			                echo '<li><a class="nextconta" href="'.get_site_url()."/alianzas/page/".$n.'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
			              
			              
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
</div> 
<?php get_footer();