<header id="banner" class="outer" role="banner">
	<div class="inner">
		<div id="site-title">
			<a href="<?= esc_url(site_url()); ?>">
				<span class="screen-reader-text">20 Stories High</span>
			</a>
		</div>
		<?php 
		$main_menu = get_field('main_menu', 'options');
		if ($main_menu):
			global $wp;
			$current_url = home_url(add_query_arg([], $wp->request));
		?>
		<nav id="main-menu" role="navigation" aria-label="Main Navigation">
			<ul>
				<?php foreach ($main_menu as $menuItem) : 
					$bg_colour = $menuItem['background_colour'];
					$link = $menuItem['link'];
					$is_current = untrailingslashit($link) === untrailingslashit($current_url);
				?>
				<li class="<?= esc_attr($bg_colour); ?>">
					<a href="<?= esc_url($link); ?>" <?php if ($is_current) echo 'aria-current="page"'; ?>>
						<?= esc_html($menuItem['title']); ?>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
			<button class="burger-menu" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu-modal">
				<span class="bar top"></span>
				<span class="bar middle"></span>
				<span class="bar bottom"></span>
			</button>
			<button class="search-toggle" aria-label="Open Search" aria-expanded="false" aria-controls="search-modal">
				<span class="search-icon"></span>
			</button>
		</nav>
		<?php endif; ?>
	</div>
</header>
