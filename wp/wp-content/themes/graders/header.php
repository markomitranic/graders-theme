<!--
Header Template
This is just a suggestion of what woudl be used within the header when making Wordpress templates.

Header menu can be created simply with calling a function. It will generate a simple ul>li>a list of menu items from that particular menu.
Creating header menus: https://developer.wordpress.org/reference/functions/wp_nav_menu/

If you are not into that kind of stuff and need special elements, classes and stuff, you can create a custom loop menu. This is what the second example is for.
-->
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php echo get_the_title() . ' || ' . get_bloginfo('name'); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <?php wp_head(); ?>
</head>
<body>

	<div id="mobile-menu">
		<nav>
	    	<?php wp_nav_menu( array(
	    		'theme_location'	=>	'header-menu',
	    	) ); ?>
		</nav>
	</div>


	<div class="row">
		<div class="col-xs-12 headerwrapper">
			<a name="top"></a>

			<nav>
				<div id="hamburger-button" class="">
					<ul>
						<li></li>
						<li></li>
					</ul>
				</div>
				<a href="<?php echo home_url(); ?>">
					<img id="logo" src="<?php echo get_field('header_logo', 'option')['sizes']['medium']; ?>" alt="<?php echo get_field('header_logo', 'option')['alt']; ?>">
				</a>
		    	<?php wp_nav_menu( array(
		    		'theme_location'	=>	'header-menu',
		    		'menu_class'		=>	'header-menu-wrapper'
		    	) ); ?>
	    	</nav>





