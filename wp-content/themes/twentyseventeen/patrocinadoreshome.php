<?php /* Template Name: patrocinadoreshome */ 
if ( ! current_user_can('administrator') ) {
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick/slick-theme.css">
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/slick/slick.js" charset="utf-8"></script>
<style type="text/css">
  .fondo{
    /*background: red;*/
  }
    .sliderproyectos.slider {
        width: 70%;
    }
    .sliderproyectos .slick-arrow {
      display: block !important;
    }

    .sliderproyectos .slick-next {
      width: 20%;
      right: 11% !important;
      height: auto !important;
      top: 110% !important;
    }
    .sliderproyectos .slick-prev {
      width: 20%;
      left: 55% !important;
      height: auto;
      top: 110% !important;
    }

    .sliderproyectos .iconflecharev {
      margin-top: 14px;
    }


    .sliderproyectos .slick-prev:before,
    .sliderproyectos .slick-next:before {
      color: black;
      display: none;
    }
    .sliderproyectos .slick-slide {
      transition: all ease-in-out .3s;
      /*opacity: .6;*/
    }
    
    .sliderproyectos .slick-active {
      opacity: .5;
    }

    .sliderproyectos .slick-current {
      opacity: 1;
    }
    .sliderproyectos .slick-slide{
      transform: scale(0.6);
    }
    .sliderproyectos .slick-center{
      transform: scale(1.4);
    }
    .sliderproyectos .slick-list{
      overflow: initial!important;

    }
    .sliderproyectos .contentslid{
      background: #f4f4f4;
      padding: 29px;
    }

    .sliderproyectos .slick-center .contentslid div{
      background: #efefef;
      padding: 30px;
      /*margin-top: -57px;*/
    }
    .sliderproyectos .slick-prev:before, .sliderproyectos .slick-next:before {
         color: #939393;
         font-size: 26px;
      }
   .sliderproyectos .slick-list .imgsig{
      display: block;
   }
   .sliderproyectos .slick-center .imgsig{
      display: none;

   }
   .sliderproyectos .slick-list .contslidpro{
      display: none;
   }
   .sliderproyectos .slick-center .contslidpro{
      display: block;

   }
   .btncenter{
      padding: 58px 0px;
   }
   .contenedorslider{
        overflow: hidden;
      padding-top: 65px;
      padding-bottom: 60px;
   }
   .sliderproyectos .proyecttitu{
        width: 34%;
      min-height: 256px;
      display: inline-block;
      background-size: cover!important;
      background-repeat: no-repeat!important;
      margin-bottom: 52px;
   }
    .sliderproyectos .proyectimg {
      width: 95%;
      min-height: 240px;
      display: inline-block;
      background-size: 75% !important;
      background-repeat: no-repeat!important;
      margin-left: -4px;
      background-color: #fff !important;
      background-position: 50% 50% !important;
      border-top: 1px solid #a9a9a952;
      box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }

    .sliderproyectos .imgsig {
      min-height: 325px;
      background-position: 50% 50% !important;
      background-color: #fff !important;
      background-repeat: no-repeat!important;
      margin-left: -58px;
      margin-top: -105px;
      margin-right: -115px;
      z-index: 1 !important;
      width: 135% !important;
    }
   .sliderproyectos .oscurotrans{
    background: rgba(103, 98, 98, 0.6);
    width: 100%;
    min-height: 256px;
   }
    .sliderproyectos .verdetrans {
      background: rgba(0, 70, 135, 0.57);
      width: 100% !important;
      height: 400px;
    }
   .titulopro{
      margin-left: 34px;
      position: absolute;
      bottom: 99px;
      color: #fff;
      font-size: 14px;
      font-weight: 600;
   }
    .sliderproyectos .flecsigue {
        font-size: 16px;
        color: #004687;
        font-weight: 600;
        font-family: 'Source Sans Pro', sans-serif !important;
    }
    .sliderproyectos .flecante {
        font-size: 16px;
        color: #004687;
        font-weight: 600;
        font-family: 'Source Sans Pro', sans-serif !important;
    }

   .sliderproyectos .iconflecha{
    margin-top: 14px;
   }
   .directoriosstylebtn .slick-prev:before, .directoriosstylebtn .slick-next:before {
    color: #ffffff !important;

}

a.directorios-btn {
    margin-top: 50px;
    margin-bottom: -75px;
}
   @media (max-width: 480px) {

    a.directorios-btn {
    margin-bottom: -40px;
    margin-top: 30px;
}

    .butemp.directoriosstylebtn .slick-next {
        right: 14% !important;
        top: 33%;
    }
.butemp.directoriosstylebtn .slick-prev {
    left: 7% !important;
    top: 33%;
}
    .directoriosstylebtn .slick-prev:before, .directoriosstylebtn .slick-next:before {
    color: #ffffff !important;
}
    .contenedorslider {
    margin-top: -50px;
}
.alinear-centro.home-revi-margen-sup {
    display: block;
}
.home-revistas-linea {
    margin: 0;
}
.alineacion-derecha.home-text {
    text-align: left !important;
}
.alineacion-derecha.home-text .linea-roja.home-servicios-linea {
    margin: -20px 10px 20px 0px !important;
}

.directorio-tit {
    margin: 60px 0 0px 0;
}
    
      .contslidpro{
          text-align: center;
      }
      .sliderproyectos .proyecttitu{
              width: 85%!important;
      position: relative;
      min-height: initial!important;
      margin-bottom: 0px!important;
      }
      .sliderproyectos .oscurotrans{
          min-height: 124px!important;
      }
      .sliderproyectos .titulopro{
          margin-left: 0!important;
          width: 100%;
          top: 15%;
      }
      .proyectimg{
          width: 100%!important;
          margin-top: -6px;
          min-height: 219px!important;
      }
      .sliderproyectos .slick-slide{
        transform: scale(0)!important;
      }
      .sliderproyectos .slick-center{
        transform: scale(1)!important;
      }
      .sliderproyectos.slider {
          width: 100%;
      }
      .sliderproyectos .slick-next {
        position: absolute;
        width: 50%;
        height: auto;
        top: 85% !important;
        right: 14% !important;
      }
      .sliderproyectos .slick-prev{
        position: absolute;
        width: 50%;
        height: auto;
        top: 85% !important;
        left: 12% !important;
      }
      .revistassliderhome.slider.slick-initialized.slick-slider {
    margin-bottom: 50px;
}
.alineacion-derecha.home-text {
    margin-top: -20px;
}
      
      .sliderproyectos .direccionpro{
        display: none;
      }
      .contenedorslider{
           padding-top: 0px!important; 
           padding-bottom: 0px!important; 
           padding-left: 0px!important; 
      }
      .sliderproyectos .slick-track{
        height: 311px;
      }
      
      .iconflecha {
        margin-top: 12%;
      }
    .verdetrmovil{
      display: none;
    }
    .contenedorslider{
      /*overflow: hidden;*/
      height: 300px;
    }

  }
  </style>
  <?php
  $params = array('posts_per_page' => -1, 'category_name' => 'patrocinadores', 'lang' => 'en,es');
  $wc_query = new WP_Query($params);
  ?>
  <div class="contenedorslider">
    <section class="sliderproyectos slider">
      <?php if ($wc_query->have_posts()) : ?>
    <?php while ($wc_query->have_posts()) :
       $wc_query->the_post(); 
       ?>
      <div class="fondo">
        <div class="contslidpro">
          <?php $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
          <img id="imageoculta" style="display: none;" src="<?php echo esc_url($featured_img_url); ?>">
          <!-- <div class="proyecttitu" style='background: url("<?php echo esc_url( $featured_img_url); ?>");'>
              <div class="oscurotrans"></div>
              <div class="titulopro"><?php echo the_title(); ?></div>
          </div> -->
          <a href="<?php echo get_site_url(); ?>/circulo-de-liderazgo/#c<?php echo get_the_ID(); ?>">
	          <div class="proyectimg" style='background: url("<?php echo esc_url( $featured_img_url); ?>");'>
	              <!-- <div class="direccionpro"><img class="icondirec" src="<?php echo get_site_url(); ?>/wp-content/themes/twentyseventeen/images/icons/i-addres.png"><?php echo get_post_meta($post->ID, 'direccionProyecto', true); ?></div> -->
	          </div>
          </a>
        </div>
        <div class="imgsig" style='background: url("<?php echo esc_url( $featured_img_url); ?>");'>
          <div class="verdetrans"></div>
        </div>
     </div>

      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else:  ?>
    <p>
       <?php _e( 'No hay proyectos'); ?>
    </p>
    <?php endif; ?>
</section>
  </div>

<script type="text/javascript">
    html = '<div class="flecsigue"></div>';
    //html += '<img class="iconflecha" src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/08/r-flecha-1.png">';
    //html += '<div style="position:relative"><img style="display:none;" id="sigimg" src=""><div style="display:none;" class="verdetrans verdetrmovil"></div><div>';


    htmltwo = '<div class="flecante"></div>';
    //htmltwo += '<img class="iconflecharev" src="<?php echo get_site_url(); ?>/wp-content/uploads/2019/08/l-flecha-1.png">';
    //htmltwo += '<div style="position:relative"><img style="display:none;" id="previmg" src=""><div style="display:none;" class="verdetrans verdetrmovil"></div><div>';

    jq162 = jQuery.noConflict( true );
    jq162(document).on('ready', function() {
      jq162('.sliderproyectos').slick({
        centerMode: true,
        centerPadding: '10px',
        slidesToShow: 2,
        autoplay: true,
        autoplaySpeed: 5000,
        // slidesToScroll: 1,
           // infinite: true,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              arrows: true,
              centerMode: true,
              centerPadding: '10px',
              slidesToShow: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              arrows: true,
              centerMode: true,
              slidesToShow: 1,
              autoplay: false,
              // centerPadding: '10px',
              // slidesToShow: 1
            }
          }
        ]
      });
      jq162('.sliderproyectos .slick-next').html(html);
      imagenseg = jq162(".slick-center").next(".slick-slide").find("#imageoculta").attr('src');
        jq162('#sigimg').attr('src', imagenseg);

      jq162( ".sliderproyectos .slick-next" ).click(function() {
        imagen = jq162(".slick-center").next(".slick-slide").find("#imageoculta").attr('src');
        jq162('#sigimg').attr('src', imagen);

      });

      jq162('.sliderproyectos .slick-prev').html(htmltwo);
      imagenseg = jq162(".slick-center").prev(".slick-slide").find("#imageoculta").attr('src');
        jq162('#previmg').attr('src', imagenseg);

      jq162( ".sliderproyectos .slick-prev" ).click(function() {
        imagen = jq162(".slick-center").prev(".slick-slide").find("#imageoculta").attr('src');
        jq162('#previmg').attr('src', imagen);

      });
   });

</script>
<?php } //endifisadmin  ?>