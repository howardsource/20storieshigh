<header id="banner" class="outer">
	<div class="inner">
		<div id="site-title"><a href="<?= site_url(); ?>">Animo PR</a></div>
		<nav id="main-menu">
			<ul>
				<?php foreach(get_field('main_menu', 'options') as $menuItem) : ?>
				<li><a href="<?= $menuItem['link']; ?>"><?= $menuItem['title']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</nav>
	</div>
</header>