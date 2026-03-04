<?php if($module['display_title']) : ?>
	<div class="module-title"><h3><?= $module['title']; ?></h3></div>
	<?php endif; ?>
<section class="outer module tiles">
	<div class="inner tile-group <?= $module['background_colours']; ?> <?= $module['tile_types']; ?>">
		<?php foreach($module['tiles'] as $tile) : ?>
		<?php $colour = ($tile['background_colour']); ?>
		<div class="tile <?php echo $colour; ?>">
			<div class="image-outer"><div class="image" style="background-image: url(<?= $tile['image']['sizes']['tiles']; ?>")"></div></div>
			<h4><?= $tile['title']; ?></h4>
			<?php if($tile['excerpt']!='' && $module['tile_types']=='image-overview') : ?><p><?= $tile['excerpt']; ?></p><?php endif; ?>
				<p class="large-button-link"><a href="<?= $tile['link']; ?>">Find Out More</a></p>
		</div>
		<?php endforeach; ?>
	</div>
	<?php if($module['more_link']!='') : ?>
	<div class="inner"><p class="large-button-link"><a href="<?= $module['more_link']; ?>"><?= $module['more_link_text']; ?></a></p></div>
	<?php endif; ?>
</section>