<div id="modules">
	<?php 
	$modules = get_field('modules');
	$modN = 1;
	$carouselN = 1;
	if($modules!=false) :
	foreach($modules as $module):
		$layout = $module['acf_fc_layout'] ?? '';
		$template_rel = $layout ? 'modules/' . $layout . '.php' : '';
		$template_path = $template_rel ? locate_template($template_rel) : '';
		if ($template_path) {
			include $template_path;
		} else {
			$missing_label = $template_rel ?: 'modules/(missing acf_fc_layout).php';
			error_log('Missing module template: ' . $missing_label);
			if (current_user_can('manage_options')) :
				?>
				<div class="outer bricklight">
					<div class="inner">
						<p>Missing module template: <?= esc_html($missing_label); ?></p>
					</div>
				</div>
				<?php
			endif;
		}
		$modN++;
		if($layout=='carousel' || $layout=='panel_slider'|| $layout=='latest_news') :
			$carouselN++;
		endif;
	endforeach; 
	endif;
	?>
</div>
