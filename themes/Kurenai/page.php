<?php
/**
 * @package WordPress
 * @subpackage Kurenai
 */

get_header(); ?>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article role="article" class="post" id="post-<?php the_ID(); ?>">
			<div>
				<h2 class="post-title no-link-title"><?php the_title(); ?></h2>
			</div>
			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
			</div>
		</article>
		<?php endwhile; endif; ?>
<?php get_footer(); ?>