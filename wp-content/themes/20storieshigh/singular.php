<?php 
	get_header();
	get_template_part('banner');
	?>
	<main id="main-content">
	<?php
	if(is_front_page()) :
		get_template_part('carousel');
		get_template_part('modules');
	else :
		if(is_singular( 'work' )) :
			get_template_part('title-banner'); 
			get_template_part('modules');
		elseif(is_singular( 'news' )) :
			get_template_part('title-banner'); 
			get_template_part('news-content');
		else :
			get_template_part('title-banner'); 
			get_template_part('modules');
		endif;
	endif;
	?>
	</main>
	<?php
	get_footer(); 
?>