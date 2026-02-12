<a class="absolute left-0 top-[-9999px] z-[9999] p-4 bg-white text-black font-bold focus:top-0 screen-reader-text" href="#main-content">Skip to content</a>

<header id="banner" class="py-8 h-[40rem] bg-green outer" role="banner">
	<div class="flex justify-between items-start h-full max-w-[135.2rem] mx-auto px-8 inner">
		<div id="site-title"><a class="block w-[11.6rem] h-[11.6rem] bg-no-repeat bg-center bg-contain transition-transform duration-300 hover:scale-110 hover:rotate-[5deg]" style="background-image: url(<?= get_stylesheet_directory_uri(); ?>/images/site-logo.png)" href="<?= esc_url(site_url()); ?>"><span class="screen-reader-text">20 Stories High</span></a></div>
		<nav id="main-menu" class="bg-white mt-6 p-[1.8rem] flex items-center gap-[1.8rem] h-[5rem] box-border" role="navigation" aria-label="Main Navigation">
			<ul role="list" class="flex gap-2 list-none m-0 p-0">
				<?php 
				$main_menu = get_field('main_menu', 'options');
				global $wp;
				$current_url = home_url(add_query_arg(array(), $wp->request));
				
				if($main_menu):
					// Map ACF color values to Tailwind classes so the scanner picks them up
					$bg_classes = [
						'navy'       => 'after:bg-navy',
						'orange'     => 'after:bg-orange',
						'yellow'     => 'after:bg-yellow',
						'blue-light' => 'after:bg-blue-light',
						'pink'       => 'after:bg-pink',
						'purple'     => 'after:bg-purple',
						'green'      => 'after:bg-green',
						'black'      => 'after:bg-black',
						'white'      => 'after:bg-white',
					];

					foreach($main_menu as $menuItem) : 
						$bg_colour = $menuItem['background_colour'];
						$link = $menuItem['link'];
						$tailwind_bg_class = isset($bg_classes[$bg_colour]) ? $bg_classes[$bg_colour] : 'after:bg-black';
						
						// Normalize URLs for comparison by removing trailing slashes
						$is_current = untrailingslashit($link) === untrailingslashit($current_url);
				?>
				<li class="<?= esc_attr($bg_colour); ?>">
					<a class="block p-1 font-primary font-[600] text-[1.6rem] leading-none uppercase text-black no-underline relative z-10 whitespace-nowrap after:content-[''] after:absolute after:bottom-[2px] after:left-0 after:w-full after:h-[0.2rem] after:transition-[height] after:duration-300 after:-z-10 hover:after:h-[calc(100%-4px)] <?= $tailwind_bg_class; ?>" href="<?= esc_url($link); ?>" <?php if($is_current) echo 'aria-current="page"'; ?>>
						<?= esc_html($menuItem['title']); ?>
					</a>
				</li>
				<?php endforeach; 
				endif; ?>
			</ul>
			<button class="burger-menu block w-10 h-[1.8rem] bg-transparent border-none p-0 cursor-pointer relative transition-[height] duration-300 group/burger hover:h-[2.4rem]" aria-label="Open Menu" aria-expanded="false" aria-controls="mobile-menu">
				<span class="bar top block w-full h-[0.2rem] bg-black absolute left-0 transition-all duration-300 top-0"></span>
				<span class="bar middle block w-full h-[0.2rem] bg-black absolute left-0 transition-all duration-300 top-1/2 -translate-y-1/2"></span>
				<span class="bar bottom block w-full h-[0.2rem] bg-black absolute left-0 transition-all duration-300 bottom-0"></span>
			</button>
			<button class="search-toggle w-[2.3rem] h-[2.3rem] flex items-center justify-center relative cursor-pointer border-none p-0 bg-transparent group/search" aria-label="Open Search" aria-expanded="false" aria-controls="search-modal">
				<span class="search-icon block w-[2.3rem] h-[2.3rem] border-2 border-black rounded-full relative box-border transition-colors duration-300 group-hover/search:border-brick after:content-[''] after:absolute after:w-[0.2rem] after:h-[1rem] after:bg-black after:top-[85%] after:left-[85%] after:-rotate-45 after:origin-top after:transition-colors after:duration-300 group-hover/search:after:bg-brick"></span>
			</button>
		</nav>
	</div>
</header>