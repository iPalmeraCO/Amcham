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
$params = array('posts_per_page' => -1, 'category_name' => 'directoriosocios');
$wc_query = new WP_Query($params);
?>

<div class="sliderempresasdestacadas slider">
<?php if ($wc_query->have_posts()) : ?>
<?php while ($wc_query->have_posts()) :
       $wc_query->the_post(); 
           
        
       ?>
    <!-- <a href=""> -->
    <div class="sliderempresa">
      <!--<a href="<?php echo get_permalink();?>">-->
      <a href="#d<?= $post->ID; ?>">
      <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'single-post-thumbnail' );?>
      <div class="imgdetalle">
        <img class="" src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>" alt="">
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
<div class="butemp">
  <div class="btn-prev slick-prev">
  </div>

  <div class="btn-next slick-next">
  </div>
</div>
<?php } //endifisadmin  ?>