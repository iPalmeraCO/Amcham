<?php
/**
 * The template for displaying search results pages.
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
	<div class="container-fluid primary search-general" style="background: #fff;">
		<div id="primary-dos" class="content-area">
			<main id="main" class="site-main buscador" role="main">
					<?php if ( have_posts() ) : ?>
					<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>
						<span class="search-page-title"><?php printf( esc_html__( 'Results for: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></span>
					<?php else: ?>
						<span class="search-page-title"><?php printf( esc_html__( 'Resultados para: %s', 'twentyseventeen' ), '<span>' . get_search_query() . '</span>' ); ?></span>
					<?php endif; ?>
					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>
					<p class="search-post-title"><?php the_title(); ?></p>
					<p class="search-post-excerpt"><?php the_excerpt(); ?></p>
					<p class="search-post-link"><a class="btn-vermas" href="<?php the_permalink(); ?>"><?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>View more<?php else: ?>Ver más<?php endif; ?></a></p>
					<?php endwhile; ?>
					<?php //the_posts_navigation(); ?>
					<?php else : ?>
					<?php //get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>
					<?php if ( !have_posts() ) : ?>
						<?php $currentlang = get_bloginfo('language'); if($currentlang=="en-US"):?>
						<span class="search-page-title" style="text-transform: inherit !important;"><?php printf( esc_html__( 'No find results for: %s', 'twentyseventeen' ), '<span style="font-weight: 600; display: block;">' . get_search_query() . '</span>' ); ?></span>
						<?php else: ?>
						<span class="search-page-title" style="text-transform: inherit !important;"><?php printf( esc_html__( 'No hemos econtrado resultados para: %s', 'twentyseventeen' ), '<span style="font-weight: 600; display: block;">' . get_search_query() . '</span>' ); ?></span>
						<?php endif; ?>
					<?php endif; ?>
			</main>
			<?php get_sidebar(); ?>
		</div>
	</div>
	<!-- .wrap -->
<?php get_footer(); ?>