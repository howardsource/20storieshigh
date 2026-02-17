<html lang="en-GB">
		<head>
				<meta name="viewport" content="width=device-width, initial-scale=1.0" />
				<meta charset="UTF-8">
				<title><?= get_bloginfo('name'); ?></title>
				<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
				<link rel="stylesheet" href="https://use.typekit.net/uzc2rly.css">
				<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
				<?php wp_head(); ?>
		</head>
	<?php
		$bodyClass = '';
	?>
	<body <?php echo body_class($bodyClass); ?>>
		<a class="donate-tab" href="<?= esc_url(site_url('donate')); ?>">Donate</a>
