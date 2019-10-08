<?php /* Template Name: Blog-us */ 
get_header(); ?>
<div class="container bread">
	<div class="cont-bread sobre-amcham">
		<a class="home" href="<?php echo get_home_url(); ?>">Home</a>
		<span class="slash">/</span>
		<div class="home">Communication</div>
		<span class="slash">/</span>
		<div class="home"><?php the_title(); ?></div>
	</div>
</div>
<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light "><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		</div>	
	</div>
	<div class="container ">
		<div class="contentsocios">
			<?php   
		      while ( have_posts() ) : the_post();
		        the_content();
		      endwhile; // End of the loop.

		      define("BLOG",103);
		      $args = array('child_of' => BLOG, 'lang' => 'en');
			  $subcategories = get_categories( $args );
		    ?>
		</div>
		<br>
		<div>
			<div class="filtros row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<h3>Search by category</h3>					
					<select name="categoria" id="categoria">
								<option value="<?= BLOG; ?>">All</option>
						<?php foreach($subcategories as $category): ?>
								<option value="<?= $category->cat_ID ?>"><?= $category->name ?> </option>
						<?php endforeach; ?>
					</select>
				</div>	
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<h3>Search by name or keyword</h3>
					<input type="text" name="nombre" id="nombre">
				</div>	
				<div class="row center w100 contbuscar">					
						<a class="btn-vermas" onclick="filter_posts_by_category_blog(99,1)" style="margin: 0px auto">SEARCH</a>	
				</div>
			</div>

			<?php 
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args  = array(
			       'cat' => 103,
			       'post_type' => 'post',
			       'posts_per_page' =>6,
			       'order' => 'desc', 
			       'paged' => $paged,
			       "lang" => "en"

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
					      				<a class="btn-vermas"  href="<?php echo get_permalink(); ?>"><span class="texto-btn">View more</span><span class="separador">|</span><span class="estilo-mas">+</span></a>
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
										<a class="btn-vermas"  href="<?php echo get_permalink(); ?>"><span class="texto-btn">View more</span><span class="separador">|</span><span class="estilo-mas">+</span></a>
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
			              
			                echo '<li><a class="prevconta" onclick="filter_posts_by_category_blog(-1,'.$n.')"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>';
			                          
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
			              
			                 echo "<li class='".$class." element'><a onclick='filter_posts_by_category_blog(-1,".$cont.")'>".$cont."</a></li>";
			             
			              $cont ++;
			            }
			            if ($paged != $total_pages){
			              $n = $paged + 1;
			              
			                echo '<li><a class="nextconta" onclick="filter_posts_by_category_blog(-1,'.$n.')"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>';
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
       
       
        //filter_posts_by_category_blog('all', 1);
       
    });

   
   
    var filter_posts_by_category_blog = function(cat, npag){
    	//Filtrar todos
    	var cat_slug = "<?= BLOG; ?>";  
    	var nombre = "";
    	if (cat != -1){
			cat_slug = $("#categoria").val();
			nombre   = $("#nombre").val(); 
    	} 
        var ajax_url = '<?= site_url(); ?>'+'/wp-admin/admin-ajax.php';
       	
        var total_posts = -1; // -1 for show all posts
       
        var data = {
            'action'    : 'filter_posts_by_category_blog',
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