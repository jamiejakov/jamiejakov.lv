<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/*
Template Name: Archives
*/
?>

<?php get_header(); ?>

<div id="content">

<h3>Archives by Month:</h3>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

<h3>Archives by Subject:</h3>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>

</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>