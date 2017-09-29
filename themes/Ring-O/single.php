<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();?>

	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article role="article" <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h2 class="post-title"><?php the_title(); ?></h2>
			<div class="date"><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></div>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				
			</div>
			<div class="post-metadata">
				<p>Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></p>
				<p>In the category: <?php the_category(', ') ?></p>
				<p>Tagged with: <?php the_tags( '', ', ', ''); ?></p>
			</div>
			<?php edit_post_link('Edit', ''); ?>
		</article>
		
	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>




<?php get_footer(); ?>