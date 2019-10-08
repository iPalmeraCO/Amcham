<?php
   /**   
      * The template for displaying all pages      
      * This is the template that displays all pages by default.
      * Please note that this is the WordPress construct of pages and that other   
      * 'pages' on your WordPress site will use a different template.   
      * Template Name: Job Search
   
      * @package WordPress   
      * @subpackage Twenty_Thirteen   
      * @since Twenty Thirteen 1.0
    */

get_header(); ?>
<div  class="container heigth-h">
  <div class="container bread">
    <div class="cont-bread sobre-amcham">
      <a class="home" href="<?php echo get_home_url(); ?>">Inicio</a>
      <span class="slash">/</span>
      <div class="home">Servicios</div>
      <span class="slash">/</span>
      <div class="home">Job Search</div>
      <span class="slash">/</span>
      <div class="home"><?php the_title(); ?></div>
    </div>
  </div>
   <?php   
      while ( have_posts() ) : the_post();
        the_content();
      endwhile; // End of the loop.
    ?>
</div>
<!-- #primary -->
<?php get_footer(); ?>