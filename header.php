<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pophealth_1.0
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
<div id="content" role="main">
	<header>

		<div id="uts-bar">
			<a href="https://utsystem.edu"><img alt="The University of Texas System" src=<?php echo get_template_directory_uri() . "/img/uts-type.svg"?>></a>
		</div>
		<nav class="navbar navbar-expand-lg navbar-inverse bg-inverse">
			<a id="nav-icon" class="navbar-brand" href="./">
				<img src=<?php echo get_template_directory_uri() . "/img/logo.svg" ?> class="d-inline-block align-top" alt="tcmhcc logo" title="home">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" name="Toggle navigation">
				<span class="navbar-toggler-icon"><k class="fas fa-bars"></i></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<?php
				wp_nav_menu( array(
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => 'ul',
					'container_class'   => 'navbar-nav ml-auto',
					'container_id'      => 'bs-example-navbar-collapse-1',
					'menu_class'        => 'navbar-nav ml-auto',
					'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
					'walker'            => new WP_Bootstrap_Navwalker(),
				) );
				?>
				<!-- <ul class="navbar-nav ml-auto">

					<li class="nav-item dropdown">
						<a class="nav-link" href="#"aria-haspopup="true" data-toggle="dropdown" aria-expanded="false">
						ABOUT
						</a>
						<div class="dropdown-menu animate slideIn" >
							<a class="dropdown-item" href="./overview/">Overview</a>
							<a class="dropdown-item" href="./executive-committee/">Executive Committee</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" href="./initiatives" aria-haspopup="true" aria-expanded="false">
						INITIATIVES
						</a>

					</li>

					<li class="nav-item dropdown">
						<a class="nav-link" href="./meetings/" aria-haspopup="true" aria-expanded="false">
						MEETINGS
						</a>

					</li>
				
				</ul> -->
			</div>
		</nav>

	</header>
