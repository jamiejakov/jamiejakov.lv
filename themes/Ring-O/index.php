<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
			<article role="article" <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2 class="post-title">
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Read Post:  <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2>
				<div class="date"><?php the_time('F jS, Y') ?></div>
				<div class="entry">
					<?php the_content('Read More <em>▷</em>'); ?>
					<?php edit_post_link('Edit', ''); ?>
				</div>
			</article>
		<?php endwhile; ?>
		
		<div id="page_navi" role="navigation">
			<?php wp_pagenavi(); ?>
			<ul id="mobile_page_navi">
				<li class="nav-prev"><?php next_posts_link( __( ' Older posts <span class="meta-nav">&rarr;</span>') ); ?></li>
				<li class="nav-next"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Newer posts ') ); ?></li>	
			</ul>
		</div>
		
	<?php else : ?>

		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php get_search_form(); ?>

	<?php endif; ?>

<?php get_footer(); ?>