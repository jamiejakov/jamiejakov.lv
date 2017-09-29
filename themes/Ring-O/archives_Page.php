<?php
/*
Template Name: Archives and Tag Cloud
*/

get_header(); ?>
 

<article role="article" class="post page" id="archive">                           
	<h2 class="post-title"> Archive </h2> 
	<div class="entry">
		<img class="wp-image-1808" id="archive_img" style="float: right; display: inline; padding: 10px;" alt="blog1" src="http://jamiejakov.me/wp-content/images/archive.png"  />
	<p class="page_explain">
		All my posts, all in one place! So you can browse and see my activity over the passing years.
		All entrees in this Railgun (I mean Index) are sorted by date posted.
	</p>
	
</article>

<article role="article" class="post page" id="tagcloud">                           
	<h2 class="post-title"> Tag Cloud </h2> 
	<div class="entry">
		<img class="wp-image-1808" id="tagcloud_img" style="float: right; display: inline; padding: 10px;" alt="tagcloud" src="http://jamiejakov.me/wp-content/images/tagcloud.png" />
		<p class="page_explain">
			My 45 most used tags, right here in one spot. Multiple posts have the same tags, so by clicking on each you will see all posts with similar content.
		</p>
		<div id="alltags">
        	<?php wp_tag_cloud(''); ?>
		</div>
	</div>
</article>
 
<?php get_footer(); ?>