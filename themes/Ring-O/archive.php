<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>
	
	<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h3 class="pagetitle">Posts in the <?php single_cat_title(); ?> Category</h3>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h3 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h3>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h3 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h3>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h3 class="pagetitle">Archive for <?php the_time('F, Y'); ?></h3>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h3 class="pagetitle">Archive for <?php the_time('Y'); ?></h3>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h3 class="pagetitle">Author Archive</h3>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h3 class="pagetitle">Blog Archives</h3>
 	  <?php } ?>



		<?php while (have_posts()) : the_post(); ?>
		<article role="article" <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
				<div class="date"><?php the_time('l, F jS, Y') ?></div>
				<div class="entry">
					<?php the_content('Read More <em>▷</em>') ?>
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
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>

<?php get_footer(); ?>