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

<h1 class="archive-title">Category: <?php single_cat_title( '', false ); ?></h1>
 
 
<?php
// Display optional category description
 if ( category_description() ) : ?>
<div class="archive-meta"><?php echo category_description(); ?></div>
<?php endif; ?>
</header>
 
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
 
else: ?>
<p>Sorry, no posts matched your criteria.</p>
 
 
<?php endif; ?>
</div>
    
  


 
 
<?php// get_sidebar(); ?>
<?php get_footer(); ?>