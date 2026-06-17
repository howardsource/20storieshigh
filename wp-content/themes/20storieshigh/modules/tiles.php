<?php if($module['display_title']) : ?>
	<div class="module-title"><h3><?= $module['title']; ?></h3></div>
	<?php endif; ?>
<section class="outer module tiles">
	<div class="inner tile-group <?= esc_attr($module['tile_types']); ?>">
		<?php foreach($module['tiles'] as $tile) : ?>
		<?php $colour = ($tile['background_colour']); ?>
		<?php $tile_link = isset($tile['link']) ? trim((string) $tile['link']) : ''; ?>
		<div class="tile <?= esc_attr($colour); ?><?= $tile_link !== '' ? ' has-link' : ''; ?>">
			<?php if ($tile_link !== '') : ?>
				<a class="tile-overlay-link" href="<?= esc_url($tile_link); ?>" aria-label="<?= esc_attr($tile['title']); ?>"></a>
			<?php endif; ?>
			<div class="image-outer"><div class="image" style="background-image: url('<?= esc_url($tile['image']['sizes']['tiles']); ?>')"></div></div>
			<?php if ($module['tile_types']==='image-title') : ?>
				<h4>
					<?php if ($tile_link !== '') : ?>
						<span><?= esc_html($tile['title']); ?></span>
					<?php else : ?>
						<?= esc_html($tile['title']); ?>
					<?php endif; ?>
				</h4>
			<?php else : ?>
				<h4><?= esc_html($tile['title']); ?></h4>
			<?php endif; ?>
			<?php if($tile['excerpt']!='' && $module['tile_types']=='image-overview') : ?><p><?= $tile['excerpt']; ?></p><?php endif; ?>
				<?php if ($module['tile_types']!=='image-title' && $tile_link !== '') : ?>
					<p class="large-button-link">
						<span>Find Out More</span>
					</p>
				<?php endif; ?>
		</div>
		<?php endforeach; ?>
	</div>
	<?php 
	$ml = isset($module['more_link']) ? $module['more_link'] : '';
	$more_link_url = is_array($ml) ? (isset($ml['url']) ? $ml['url'] : '') : (string) $ml;
	if($more_link_url!='') : ?>
	<div class="inner"><p class="large-button-link"><a href="<?= esc_url($more_link_url); ?>"><?= esc_html($module['more_link_text']); ?></a></p></div>
	<?php endif; ?>
</section>
