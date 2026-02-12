<!DOCTYPE html>
<html <?php language_attributes(); ?> class="min-h-screen">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?= get_bloginfo('name'); ?></title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
		<link rel="stylesheet" href="https://use.typekit.net/uzc2rly.css">
		<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<?php
		$bodyClass = 'bg-white text-black';
	?>
	<body <?php body_class($bodyClass); ?>>
		<?php 
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} 
		?>
