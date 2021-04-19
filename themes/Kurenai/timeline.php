<?php
/*
* @subpackage Kurenai
Template Name: Timeline
*/

get_header(); ?>
<article id="timeline-page">
	<div class="entry">
		<p>Timeline of all my life desu.</p>
		</p>
		<?php while (have_posts()) : the_post(); ?>
			<?php the_content('Read More <em>▷</em>') ?>
			<?php edit_post_link('Edit', ''); ?>
		<?php endwhile; ?>
	</div>
</article>
<?php get_footer(); ?>