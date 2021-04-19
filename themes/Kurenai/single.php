<?php
/**
 * @package WordPress
 * @subpackage Kurenai
 */

get_header();?>

	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<article role="article" <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<div class="title-image">
				<?php if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
				?>
			</div>
			<div class="post-title no-link-title">
				<h2><?php the_title(); ?></h2>
			</div>
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