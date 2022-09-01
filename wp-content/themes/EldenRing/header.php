<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Elden_Ring_Wiki
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<div class="navbar">
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/find-a-team">Find a Team</a></li>
			<li><a href="/improve-your-game">Improve Your Game</a></li>
			<li><a href="/about">About</a></li>
			<li><a href="/login">Login</a></li>
		</ul>
	</div>
