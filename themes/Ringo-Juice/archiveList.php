<?php
/*
*@subpackage Ringo-Juice
Template Name: ArchiveList
*/

get_header(); ?>

<article id="categories">   
	<div class="post-title no-link-title"><h2>Categories</h2></div>                        
	<div class="entry">
		<p class="page_explain">This page has all the categories that can be found on my blog. Feel free to browse the topics you find interesting, or dig into something completely new.</p>
		<ul>
			<li>
				<a class="category-link" href="http://jamiejakov.me/category/anime/">Anime</a> - All anime ralated new: updates, images, songs, PVs, season charts, goods...
			</li>
			<li>
				<a class="category-link" href="http://jamiejakov.me/category/games/"> Games</a> - PC, PS3/4, XBOX/one, Wii/U, GBA, iOS, 3DS, etc... all about playing and winning 
			</li>
			<li>
				<a class="category-link" href="http://jamiejakov.me/category/internetz/">Internetz</a> - News, Info, Vidz, Lolz, memes and everything else that comes from the internet
			</li>
			<li>
				<a class="category-link" href="http://jamiejakov.me/category/life/">Life</a> - Everything happening in the real world, wether it be about my life or just thoughts
			</li>
			<li>
				<a class="category-link" href="http://jamiejakov.me/category/movies_tv/">Movies &amp; TV</a> - Movies, films, animated shorts, TV series, their actors, studios and trivia
			</li>
			<li>
				<a class="category-link" href="http://jamiejakov.me/category/music/">Music</a> - Artists, songs, music videos, instruments and anything else to do with sound
			</li>
			<li>
				<a class="category-link" href="http://jamiejakov.me/category/technology/">Technology</a> - Hardware, software, cool features, beautiful interfaces, etc..
			</li>
			<li>
				<a class="category-link" href="http://jamiejakov.me/category/travel/">Travel</a> - Posts where I talk about my experiences and impressions of traveling abroad. 
			</li>
			<li>
				<a class="category-link" href="http://jamiejakov.me/category/photo/">Photography</a> - Here you will see photos which were taken just for the purpose of taking a beautiful photo. 
			</li>			
		</ul>
	</div>
</article>
<article id="archive">
	<div class="post-title no-link-title"><h2>Archive Index</h2></div>
	<div class="entry">
		<p>What a long strange trip it's been. Look at how much content I have managed to produce. Some post are of course arguably better the others, but still entertaining nevertheless. Explore the years past and discover something new.</p>
		<p><a href="/ringo"><img class="background alignright" id="archive-bg" alt="" src="http://i0.wp.com/jamiejakov.me/wp-content/images/archives.png" width="300" height="301" scale="2"></a>
		</p>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content('Read More <em>▷</em>') ?>
			<?php edit_post_link('Edit', ''); ?>
		<?php endwhile; endif;?>
	</div>
</article>

<?php get_footer(); ?>