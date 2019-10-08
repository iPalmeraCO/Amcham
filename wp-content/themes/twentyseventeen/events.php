<?php /* Template Name: Events */ 
get_header(); ?>
<div class="loadercontainer">
	<img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/09/loader-gif-3.gif" alt="">
</div>
<div class="container bread">
  <div class="cont-bread sobre-amcham">
    <a class="home" href="<?php echo get_home_url(); ?>">Home</a>
    <span class="slash">/</span>
    <div class="home"><?php the_title(); ?></div>
  </div>
</div>
<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits">
		 	<h1 class="tit1 titulo-light tit-light-margindos tit-nuestros"><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		</div>	
	</div>
</div>
<div class="container">
<?php 
define ("CATEVENTOID", 133);
   
   $category_id = CATEVENTOID;   
   $months = list_months_bycategory($category_id,"product");	

	
	$args = array('child_of' => CATEVENTOID, 'taxonomy' => "product_cat");
	$subcategories = get_categories( $args );   	
	
?>

<div class="filtros row top5">
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<h3>Category</h3>					
			<select name="categoria" id="categoria">
						<option value="events">All</option>
				<?php foreach($subcategories as $sub): ?>
						<option value="<?= $sub->slug ?>"><?= $sub->name ?> </option>
				<?php endforeach; ?>
			</select>
		</div>

		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<h3>Month</h3>					
			<select name="mes" id="mes">
						<option value="-1">All</option>
				<?php foreach($months as $month): ?>
						<option value="<?= $month ?>"><?= get_month_spanish($month); ?> </option>
				<?php endforeach; ?>
			</select>
		</div>	
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<h3>Keyword</h3>
			<input type="text" name="pbuscar" id="pbuscar">
		</div>	
		<div class="row center w100 contbuscar">					
				<a class="btn-vermas" onclick="filter_posts_eventos()" style="margin: 0px auto">SEARCH</a>	
		</div>
	
<div class="contenteventos"> 
	<?php 

	 $args  = array(
       
       'orderby' => 'date',
       'post_type' => 'product',
       'lang' => 'en,es',
       'product_cat' => 'events',
       'posts_per_page' => -1
   );
   $r     = new WP_Query($args);
   
   //print_r($r);

		$total = $r;
		$contador = 1;
		while ($r->have_posts()) :
        $r->the_post();     
        global $product;                   
       
			 if(($contador % 2)!= 0) { ?>
				<div class="row">
					<div class="col-md-6 margineventop paddingevents">
			      		<div class="imagenevent"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/blog-img-4.jpg">
			      			<div class="fechaevento"><?php echo $product->get_attribute( 'fecha2' ); ?></div>
			      		</div>
			      		<?php 
			      			if ($contador !=1 ) { ?>
			      				<div class="marcoizquierdodos"></div>
			      			<?php }
			      		?>
			      		<div class="contentcircu contentevent">
			      			<h3><?php echo the_title(); ?></h3>
			      			<p><?php the_excerpt(); ?></p>
			      			<div class="contentfecevent">
			      				<span class="fechadeevento"><?php echo $product->get_attribute( 'fecha' ); ?></span>
			      				<span class="horadeevento"><?php echo $product->get_attribute( 'hora' ); ?></span>
			      			</div>
			      			<div class="btnvermas btnvermaseventos"><a class="btn-vermas" href="<?php echo get_permalink(); ?>"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>View more<?php else: ?>Ver más<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">></span></a></div>
			      		</div>
			      		<?php 
			      			if ($contador == 1 ) { ?>
			      				<div class="marcoizquierdouno"></div>
			      			<?php }
			      		?>
			      	</div>
			<?php }
			if(($contador % 2) == 0) { ?>
					<div class="col-md-6 marginevent margineventop paddingevents">
			      		<div class="imagenevent imageneventdos"><img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/07/blog-img-4.jpg">
			      			<div class="fechaevento"><?php echo $product->get_attribute( 'fecha2' ); ?></div>
			      		</div>
			      		<?php 
			      			if ($contador !=2 ) { ?>
			      				<div class="marcoderechodos"></div>
			      			<?php }
			      		?>
			      		<div class="contentcircu contentevent">
			      			<h3><?php echo the_title(); ?></h3>
			      			<p><?php the_excerpt(); ?></p>
			      			<div class="contentfecevent">
			      				<span class="fechadeevento"><?php echo $product->get_attribute( 'fecha' ); ?></span>
			      				<span class="horadeevento"><?php echo $product->get_attribute( 'hora' ); ?></span>
			      			</div>
			      			<div class="btnvermas btnvermaseventos"><a class="btn-vermas" href="<?php echo get_permalink(); ?>"><span class="texto-btn"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>View more<?php else: ?>Ver más<?php endif; ?></span><span class="separador">|</span><span class="estilo-mas">+</span></a></div>
			      		</div>
			      		<?php 
			      			if ($contador == 2) { ?>
			      				<div class="marcoderechoouno"></div>
			      			<?php }
			      		?>
			      	</div>
				</div>
			<?php
			}
		$contador++;
		endwhile;
	?>
</div>
	
	<!--<div class="boxpag">
		<ul class="container contaipaginat">
			<li class="bulletactive element"><a href="#">1</a></li>
			<li class=" element"><a href="#">2</a></li>
		</ul>
	</div>-->
	<script type="text/javascript">
    jQuery(document).ready(function(){
       
       
        //filter_posts_by_category('all', 1);
       
    });

   
   
    var filter_posts_eventos = function(){
    	
		var mes     = $("#mes").val();
		var pbuscar = $("#pbuscar").val(); 
		var cat     = $("#categoria").val(); 
    	
        var ajax_url = '<?= site_url(); ?>'+'/wp-admin/admin-ajax.php';
       	
        var total_posts = -1; // -1 for show all posts
       
        var data = {
            'action'   : 'filter_posts_eventos',
            'mes'      : mes,
            'pbuscar'  : pbuscar,            
            'cat'      : cat
            //'paged'       : npag
        };
       
        jQuery.ajax({
            method:"POST",
            url: ajax_url,
            data: data,
            beforeSend : function(){
            	jQuery('.loadercontainer').show();
            },
            success: function(result){
                jQuery('.contenteventos').html(result);
            	jQuery('.loadercontainer').hide();
            },
            error: function(xhr,status,error){
                // console.log(error);
            }
        });
    }
   
    </script>

</div>
<br>
	<br>
</div>
<?php get_footer();