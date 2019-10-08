<?php
/**
* A Simple Category Template
*/
 
get_header(); ?> 
<div class="container bread">
  <div class="cont-bread sobre-amcham">
    <a class="home" href="<?php echo get_home_url(); ?>">Inicio</a>
    <span class="slash">/</span>
    <div class="home">Comunicación</div>
    <span class="slash">/</span>
    <div class="home"><?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></div>
  </div>
</div>
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

<div class="filtros row" style="margin-top: 40px;">
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

   <div class="contentrevistasinaction"> 
  <div class="row" style="margin-top: 40px; margin-bottom: 40px;">
<?php
 
   $cont = 1;
  // The Loop
     $args = array( 
          'posts_per_page' => -1, 
          'orderby'        => 'date', 
          'order'          => 'DESC' ,
          'cat' => $category_id
      );

     $fil = query_posts($args);
  while ( have_posts() ) : the_post(); ?>
    <div class="col-lg-4 col-md-4 col-sm-12" style="margin-bottom: 60px; margin-top: 0px;">
      <h6 style="margin: 10px 0; padding: 0px;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
  <small></small>
   <a href="<?php the_permalink() ?>">
    <?php the_post_thumbnail( 'full' );  ?>
   </a>
  <!--<div class="entry">
  <?php /* the_content(); ?>
   
   <p class="postmetadata"><?php
    comments_popup_link( 'No comments yet', '1 comment', '% comments', 'comments-link', 'Comments closed');
   */ ?></p>
  </div>-->
   </div>
  <?php endwhile; ?>
  </div>
  <!--</div>-->  
  <?php endif; ?>
  </div> <!-- END CONTENT REVISTAS --> 
</div>
    
    
  
<script type="text/javascript">
    jQuery(document).ready(function(){
       
       
        //filter_posts_by_category('all', 1);
       
    });

   
   
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
                jQuery('.contentrevistasinaction').html(result);
            },
            error: function(xhr,status,error){
                // console.log(error);
            }
        });
    }
   
    </script>

 
 
<?php// get_sidebar(); ?>
<?php get_footer(); ?>