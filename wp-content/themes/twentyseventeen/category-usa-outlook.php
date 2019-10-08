<?php get_header(); ?>
<div class="loadercontainer">
  <img src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/09/loader-gif-3.gif" alt="">
</div>
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
  <div class="row">
    <?php  
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args  = array(
             'cat' => $category_id,
             'post_type' => 'post',
             'lang' => 'en,es',
             'posts_per_page' =>70,
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
          <?php if(($contador % 2)!= 0) { ?>
              <?php $boxrow = 'abierto'; ?>
                <div class="col-md-6 margincircutop paddingoutl">
                  <div class="imagencircu imgusa"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
                  <div class="contentcircu">
                    <h3><?php the_title(); ?></h3>
                    <!-- <p><?php the_excerpt(); ?></p> -->
                    <div class="fecha-usa"><p><?php the_time('d M, Y') ?></p></div>
                    <div class="btnvermas btnvermasdos">
                      <a class="btn-vermas" href="<?php echo get_permalink(); ?>">
                        <span class="texto-btn">Ver ahora</span>
                        <span class="separador">|</span><span class="estilo-mas">+</span>
                      </a>
                    </div>
                  </div>
                </div>
              <?php }
          if(($contador % 2)== 0) { ?>
                <div class="col-md-6 marginusatop paddingoutl">
                  <div class="imagencircu imgusa imgusa2"><?php if (has_post_thumbnail() ) :  the_post_thumbnail('large'); endif; ?></div>
                  <div class="contentcircu">
                    <h3><?php the_title(); ?></h3>
                    <!-- <p><?php the_excerpt(); ?></p> -->
                    <div class="fecha-usa"><p><?php the_time('d M, Y') ?></p></div>
                    <div class="btnvermas btnvermasdos">
                      <a class="btn-vermas" href="<?php echo get_permalink(); ?>">
                        <span class="texto-btn">Ver ahora</span>
                        <span class="separador">|</span><span class="estilo-mas">+</span>
                      </a>
                    </div>
                  </div>
                </div>
              <?php $boxrow = 'cerrado'; ?>
          <?php } ?>            
          <?php $contador++;
            endwhile; 
            if($boxrow == 'abierto') { ?>
        </div>
        <?php } ?>
  </div>
  <!--</div>-->  
  <?php endif; ?>
  </div> <!-- END CONTENT REVISTAS --> 
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
    'tipo'     : "usa-outlook",
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
        jQuery('.contentrevistasinaction').html(result);
        jQuery('.loadercontainer').hide();
      },
      error: function(xhr,status,error){

      }
    });
  }
</script>
<?php// get_sidebar(); ?>
<?php get_footer(); ?>