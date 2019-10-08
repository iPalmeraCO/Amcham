<?php
   /**   
      * The template for displaying all pages      
      * This is the template that displays all pages by default.
      * Please note that this is the WordPress construct of pages and that other   
      * 'pages' on your WordPress site will use a different template.   
      * Template Name: directorioshome
   
      * @package WordPress   
      * @subpackage Twenty_Thirteen   
      * @since Twenty Thirteen 1.0
    */
   /*
if ( ! current_user_can('administrator') ) {
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/slick/slick.js" charset="utf-8"></script>

<style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

   

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }

    .slick-arrow {
      display: none!important;
  }
  </style>
 
  <script type="text/javascript">
    jq162 = jQuery.noConflict( true );
    jq162(document).ready(function() {
      
      
      jq162(".directoriossliderhome").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            
          }
        }        
      ]
      });

      jq162('.btn-prev').click(function(){
        jq162(".directoriossliderhome").slick('slickPrev');
      });
      jq162('.btn-next').click(function(){
          jq162(".directoriossliderhome").slick('slickNext');
      });

      });
    
</script>

<?php
$params = array('posts_per_page' => -1, 'category_name' => 'directoriosocios');
$wc_query = new WP_Query($params);
?>

<div class="directoriossliderhome slider">
<?php if ($wc_query->have_posts()) : ?>
<?php while ($wc_query->have_posts()) :
       $wc_query->the_post(); 
           
        
       ?>
    <!-- <a href=""> -->
    <div class="sliderdirectorio">
      <!--<a href="<?php echo get_permalink();?>">-->
      <a href="<?php echo get_site_url(); ?>/directorio-de-socios#d<?= $post->ID; ?>">
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $wc_query->post->ID ), 'single-post-thumbnail' );?>
      <div class="imgdetalle">
        <img class="rounded-circle" src="<?php  echo $image[0]; ?>" data-id="<?php echo $wc_query->post->ID; ?>" alt="">
      </div>   
      </a>
   </div>
   <!-- </a>    -->
   <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
<?php else:  ?>
<p>
   <?php _e( 'No hay revistas'); ?>
</p>
<?php endif; ?>
<!-- #primary -->
</div>
<div class="butdir">
  <div class="btn-prev slick-prev">
  </div>

  <div class="btn-next slick-next">
  </div>
</div>
<?php } */ //endifisadmin  ?>
<?php
   /**   
      * The template for displaying all pages      
      * This is the template that displays all pages by default.
      * Please note that this is the WordPress construct of pages and that other   
      * 'pages' on your WordPress site will use a different template.   
      * Template Name: directorioshome
   
      * @package WordPress   
      * @subpackage Twenty_Thirteen   
      * @since Twenty Thirteen 1.0
    */
if ( ! current_user_can('administrator') ) {
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/slick/slick.js" charset="utf-8"></script>

<style type="text/css">
    html, body {
      margin: 0;
      padding: 0;
    }

    * {
      box-sizing: border-box;
    }

   

    .slick-slide {
      margin: 0px 20px;
    }

    .slick-slide img {
      width: 100%;
    }

    .slick-prev:before,
    .slick-next:before {
      color: black;
    }


    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }
    
    .slick-active {
      opacity: .5;
    }

    .slick-current {
      opacity: 1;
    }

    .slick-arrow {
      display: none!important;
  }
  </style>
 
  <script type="text/javascript">
    jq162 = jQuery.noConflict( true );
    jq162(document).ready(function() {
      
      
      jq162(".sliderempresasdestacadas").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
            
          }
        }        
      ]
      });

      jq162('.btn-prev').click(function(){
        jq162(".sliderempresasdestacadas").slick('slickPrev');
      });
      jq162('.btn-next').click(function(){
          jq162(".sliderempresasdestacadas").slick('slickNext');
      });

      });
    
</script>

<?php
$params = array('posts_per_page' => -1, 'lang' => 'en,es', 'category_name' => 'directoriosocios','meta_query' => array(
                   'order_clause' => array(
                        'key' => 'destacada',
                        'value' => '1',
                        'type' => 'NUMERIC' // unless the field is not a number
            )));
$wc_query = new WP_Query($params);


$direccion = "Dirección";
$telefono  = "Teléfono";

if (get_locale() == "en_US"){
    $direccion = "Address";
    $telefono  =  "Telephone";
}
?>

<div class="sliderempresasdestacadas slider">
<?php if ($wc_query->have_posts()) : ?>
<?php while ($wc_query->have_posts()) :
       $wc_query->the_post(); 
           
        
       ?>
    <!-- <a href=""> -->
    <div class="sliderempresa">
      <!--<a href="<?php echo get_permalink();?>">-->
      <a href="#modal-<?= $post->ID; ?>" data-toggle="modal">
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $wc_query->post->ID ), 'single-post-thumbnail' );?>
      <div class="imgdetalle">
        <img class="" src="<?php  echo $image[0]; ?>" data-id="<?php echo $wc_query->post->ID; ?>" alt="">
      </div>   
      </a>
   </div>
   
      <div class="modal fade modales" id="modal-<?php echo get_the_ID(); ?>">
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
                                <p><span class="texto-azul-claro"><?= $direccion; ?>:  </span><?php echo get_post_meta($post->ID, 'direccion', true); ?></p>
                            <p><span class="texto-azul-claro"><?= $telefono; ?>:  </span><?php echo get_post_meta($post->ID, 'telefono', true); ?></p>
                            <!--<p><span></span><?php echo get_post_meta($post->ID, 'actividad', true); ?></p>-->
                              </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

   <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
<?php else:  ?>
<p>
   <?php _e( 'No hay revistas'); ?>
</p>
<?php endif; ?>
<!-- #primary -->
</div>
<div class="butemp directoriosstylebtn">
  <div class="btn-prev slick-prev">
  </div>

  <div class="btn-next slick-next">
  </div>
</div>
<?php } //endifisadmin  ?>

<script type="text/javascript">
$('.modales').appendTo('body');
</script>