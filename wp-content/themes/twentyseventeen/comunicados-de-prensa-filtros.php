<?php /* Template Name: comunicados-de-prensa-filtros */ 
			
 
	 $cont = 1;
	// The Loop

	   $args = array( 
	        'posts_per_page' => -1, 
	        'orderby'        => 'date', 
	        'order'          => 'ASC' ,
	        'cat' => $_POST["cat"],
	        'date_query' => array(
		        $_POST["date_query"],
		    ),
	    );

	   $fil = query_posts($args);
	while ( have_posts() ) : the_post(); ?>
	<?php if ($cont == 1) : ?>
	<div class="row">
	<?php endif; ?>	
	  <div class="col-lg-4 col-md-4 col-sm-12">
	    <h6><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
	<small><?php the_time('F jS, Y') ?> by <?php the_author_posts_link() ?></small>
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
	<?php 
	$cont++;
	if ($cont == 3) :  $cont = 1;?>
	</div>
	<?php endif; 
	endwhile; 
	 
	 if ($cont != 3) : ?>
	<!--</div>-->
	<?php endif; 


	 
	