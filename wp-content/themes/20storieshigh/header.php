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
		$current_post = get_post();
		if (is_page() && $current_post && $current_post->post_parent) {
			$bodyClass .= 'child-page';
		}
	?>
	<body <?php body_class($bodyClass); ?>>
		<a href="#main-content" class="skip-link">Skip to main content</a>
		<button
			type="button"
			class="donate-tab"
			aria-label="Open donate window"
			aria-expanded="false"
			aria-controls="donate-modal"
			data-donate-modal-trigger="true"
			data-donate-url="<?= esc_url(site_url('donate')); ?>"
		>
			Donate
		</button>
