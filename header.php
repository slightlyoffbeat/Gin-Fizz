<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Gin and Tonic
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<header id="header" class="site-header" role="banner">
	<nav role="navigation">
		<div class="navbar navbar-default navbar-fixed-top">
		<?php 
			// Fix menu overlap bug..
			if ( is_admin_bar_showing() ) echo '<div class="admin-fix"></div>'; 
		?>
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<a class="navbar-brand" href="<?php echo home_url(); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</div>
				<?php 
				wp_nav_menu( array( 
					'menu_id' 					=> 'primary-menu',
					'menu'							=> 'primary',
					'theme_location'		=> 'primary',
					'depth'							=> 2,
					'container'					=> 'div',
					'container_class'		=> 'collapse navbar-collapse navbar-responsive-collapse',
					'menu_class'				=> 'nav navbar-nav navbar-right',
					'fallback_cb'				=> 'wp_bootstrap_navwalker::fallback',
					'walker'						=> new wp_bootstrap_navwalker()
					) 
				); 
			?>
			</div>
		</div>
	</nav>
	</header><!-- #header -->

	<div class="container">
	<div id="content" class="site-content">
