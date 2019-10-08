<?php /* Template Name: Businessservice */ 

get_header(); ?>
<div class="container bread">
	<div class="cont-bread sobre-amcham">
		<a class="home" href="<?php echo get_home_url(); ?>"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Home<?php else: ?>Inicio<?php endif; ?></a>
		<span class="slash">/</span>
		<div class="home"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>Services<?php else: ?>Servicios<?php endif; ?></div>
		<span class="slash">/</span>
		<a class="home" href="<?php echo get_home_url(); ?>/trade-center/">Trade Center</a>
		<span class="slash">/</span>
		<div class="home"><?php the_title(); ?></div>
	</div>
</div>
<div id="primary" class="content-area">
	<div class="banner">
		<?php echo get_the_post_thumbnail( get_the_ID() , 'full' );	?>
		<div class="containertits alcenter w100">
		 	<h1 class="tit1 titulo-light tlar"><?php echo get_post_meta($post->ID, 'titulobanner1', true); ?></h1>
		 	<h1 class="titulo-bold-dos"><?php echo get_post_meta($post->ID, 'titulobanner2', true); ?></h1>
		 </div>
		 <div class="containerbannerbusiness cajablanca paddingbusiness">
		 	<?php echo get_post_meta($post->ID, 'textobanner', true); ?>		 	
		  </div>
	</div>
	
			<div class="container mtop7">
				<?php the_content(); ?>

				<div id="accordion" role="tablist" aria-multiselectable="true">
			          <!-- Accordion Item 1 -->
			          <div class="estatuto alcenter">
			            <div class="estatuto-header" role="tab" id="accordionHeadingOne">
			              <div class="mb-0 row">
			                <div class="col-12 no-padding accordion-head">
			                  <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyOne" aria-expanded="false" aria-controls="accordionBodyOne"
			                    class="collapsed ">
			                    <i class="fa fa-minus" aria-hidden="true"></i>
			                    <h3><?php echo get_post_meta($post->ID, 'item1', true); ?>		 	</h3>
			                  </a>
			                </div>
			              </div>
			            </div>

			            
			          </div>

			          <div id="accordionBodyOne" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingOne" aria-expanded="false">
			              <div class="card-block col-12">
			              		<div class="row">
			              			<?php echo get_post_meta($post->ID, 'contentitem1', true); ?>	
				              	</div>
			              </div>
			          </div>

			          <!-- Accordion Item 2 -->
			          <div class="estatuto alcenter">
			            <div class="estatuto-header" role="tab" id="accordionHeadingTwo">
			              <div class="mb-0 row">
			                <div class="col-12 no-padding accordion-head">
			                  <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyTwo" aria-expanded="false" aria-controls="accordionBodyTwo"
			                    class="collapsed ">
			                    <i class="fa fa-minus" aria-hidden="true"></i>
			                    <h3><?php echo get_post_meta($post->ID, 'item2', true); ?></h3>
			                  </a>
			                </div>
			              </div>
			            </div>           
			          </div>
			          <div id="accordionBodyTwo" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingTwo" aria-expanded="false">
			              <div class="card-block col-12">
			                <div class="row">
				              	<?php echo get_post_meta($post->ID, 'contentitem2', true); ?>		
			              	</div>
			              </div>
			          </div>

			          <!-- Accordion Item 3 -->
			          <div class="estatuto alcenter">
			            <div class="estatuto-header" role="tab" id="accordionHeadingThree">
			              <div class="mb-0 row">
			                <div class="col-12 no-padding accordion-head">
			                  <a data-toggle="collapse" data-parent="#accordion" href="#accordionBodyThree" aria-expanded="false" aria-controls="accordionBodyThree"
			                    class="collapsed ">
			                    <i class="fa fa-minus" aria-hidden="true"></i>
			                    <h3><?php echo get_post_meta($post->ID, 'item3', true); ?></h3>
			                  </a>
			                </div>
			              </div>
			            </div>           
			          </div>
			          <div id="accordionBodyThree" class="collapse" role="tabpanel" aria-labelledby="accordionHeadingThree" aria-expanded="false">
			              <div class="card-block col-12">
			                 <div class="row">
			                 	<?php echo get_post_meta($post->ID, 'contentitem3', true); ?>
			                 </div>
			              </div>
			          </div>
        		</div> <!-- accordion -->

        		<h3 class="piedepagina alcenter margincinco" style="margin-bottom: 40px;">
        			<?php echo get_post_meta($post->ID, 'piedepagina', true); ?>
        		</h3> 
			</div>
		
</div><!-- #primary -->

<?php
get_footer();
