<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en">

	<meta charset="utf-8" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta property="og:title" content="JamieJakov Blog" /> 
	<meta property="og:description" content="Read all about the daily life Jamie Jakov as well as his opinions on the world." /> 
	<meta name="viewport" content="width=device-width" />
	
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<link rel="icon" href="http://jamiejakov.me/wp-content/images/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon-precomposed" href="http://jamiejakov.me/wp-content/images/apple-touch-icon.png" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="stylesheet" href="http://jamiejakov.me/wp-content/themes/Ring-O/categories.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="http://jamiejakov.me/wp-content/themes/Ring-O/mobile.css" type="text/css" media="screen" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
</head>
<body>
	<?php get_sidebar(); ?>
	<div id="whiteback"></div>
	<section role="main" id="content">
		<div id="header">
			<div id="header-container">
				<a href="<?php echo get_option('home'); ?>/">
					<h1 id="title"><?php bloginfo('name'); ?></h1>
					<div id="description"><?php bloginfo('description'); ?></div>
				</a>
			</div>
		</div>