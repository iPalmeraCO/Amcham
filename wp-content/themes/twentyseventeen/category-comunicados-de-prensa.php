<?php
/**
* A Simple Category Template
*/
 
get_header(); ?> 
 
<div class="container">
 
<?php 
// Check if there are any posts to display
if ( have_posts() ) : ?>
 
<header class="archive-header">


 
 
<?php
// Display optional category description
 if ( category_description() ) : ?>
<div class="archive-meta"><?php echo category_description(); ?></div>
<?php endif; ?>
</header>
<?php 
   $categories = get_the_category();
   $category_id = $categories[0]->cat_ID;
   $years = list_years_bycategory($category_id);
   $months = list_months_bycategory($category_id,"post");	   
?>

<div class="filtros row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Mes</h3>					
			<select name="mes" id="mes">
						<option value="-1">Todos</option>
				<?php foreach($months as $month): ?>
						<option value="<?= $month ?>"><?= get_month_spanish($month); ?> </option>
				<?php endforeach; ?>
			</select>
		</div>	
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Año</h3>
			<select id="ano" value="ano">
				<option value="-1">Todos</option>
				<?php foreach($years as $year): ?>
						<option value="<?= $year ?>"><?= $year; ?> </option>
				<?php endforeach; ?>
			</select>
		</div>	
		<div class="row center w100 contbuscar">					
				<a class="btn-vermas" onclick="filter_posts_by_date()" style="margin: 0px auto">BUSCAR</a>	
		</div>
	</div>

<div class="contentcomunicadosdeprensa">
<?php
 $years = array();

  if( have_posts() ) {
    while( have_posts() ) {
      the_post();
      $year = get_the_date( 'Y' );
      if ( ! isset( $years[ $year ] ) ) $years[ $year ] = array();
      $years[ $year ][] = array( 'title' => get_the_title(), 'permalink' => get_the_permalink(), 'fecha'=>get_the_date() , 'thumbnail' => get_the_post_thumbnail_url());
    }
  }

	function sortFunction( $a, $b ) {
	    return strtotime($a["fecha"]) - strtotime($b["fecha"]);
	}


  

  foreach ($years as $year => $d):
  	usort($d, "sortFunction"); ?>
  	

  	<div class="row">
  	<h3> Comunicados <?= $year ?></h3>
  		<div class="containersposts">
  	<?php foreach ($d as $postf):?>
		
		<div class="col-lg-6 col-md-6 col-sm-12">
		    <h6><a href="<?= $postf["permalink"] ?>" rel="bookmark" title="Permanent Link to <?= $postf["title"]; ?>"><?= $postf["title"] ?></a></h6>
		
		 <a href="<?= $postf["permalink"] ?>">
		 	<img src="<?= $postf["thumbnail"]; ?>">
		 </a>
		 </p>
		</div>
  		
  	<?php endforeach; ?>
  		</div>
  	</div>

  	<?php endforeach; 

  	
  

// The Loop
/*while ( have_posts() ) : the_post(); ?>
  <div class="col-lg-6 col-md-6 col-sm-12">
    <h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
 <a href="<?php the_permalink() ?>">
 	<?php the_post_thumbnail( 'full' );  ?>
 </a>
 ?></p>
</div>-->
 </div>
<?php endwhile */; 
?>
</div>
<?php else: ?>
<p>Sorry, no posts matched your criteria.</p>
 
 
<?php endif; ?>
</div>
    
  
<script type="text/javascript">
	    var filter_posts_by_date = function(){
    	
		var mes   = $("#mes").val();
		var ano   = $("#ano").val(); 
		var cat   = "<?= $category_id; ?>";
    	
        var ajax_url = '<?= site_url(); ?>'+'/wp-admin/admin-ajax.php';
       	
        var total_posts = -1; // -1 for show all posts
       
        var data = {
            'action'   : 'filter_posts_by_date',
            'mes'      : mes,
            'ano'      : ano,
            'tipo'     : "comunicados-de-prensa",
            'cat'      : cat
            //'paged'       : npag
        };
       
        jQuery.ajax({
            method:"POST",
            url: ajax_url,
            data: data,
            beforeSend : function(){
           
            },
            success: function(result){
                jQuery('.contentcomunicadosdeprensa').html(result);
            },
            error: function(xhr,status,error){
                // console.log(error);
            }
        });
    }
   
    </script>

</script>

 
 
<?php// get_sidebar(); ?>
<?php get_footer(); ?>