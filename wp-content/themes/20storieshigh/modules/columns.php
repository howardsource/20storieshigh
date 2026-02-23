<?php 
	$class = '';
	if ( $module['cols_type'] === 'two-columns' ) {
		$class = $module['column_configuration'];
	}

	$background = $module['background_colour'] ?? 'white';
?>
<section class="outer module columns reveal <?= esc_attr( $background ); ?>">
	<?php if($module['display_title']) : ?>
	<div class="inner title title-<?= $module['cols_type']; ?><?php if($module['centred_title']) : ?> centred-title<?php endif; ?>"><h3><?= $module['title']; ?></h3></div>
	<?php endif; ?>
	<?php if($module['cols_type']=='single') : ?>
		<?php if($module['single_column']!='') : ?>
		<div class="inner column single-column reveal">
			<div class="single-column-text">
				<?php echo $module['single_column']; ?>
			</div>
		</div>
		<?php endif; ?>
	<?php else : ?>
	<div class="inner column-group <?= $module['cols_type']; ?>">
		<?php if($module['column_configuration']=='image-text') : ?>
		<div class="column image-column reveal" style="background-image: url(<?php echo $module['left_column_image']['sizes']['half-width']; ?>);"></div>
		<?php else : ?>
		<div class="column text-column reveal"><div class="text"><?php echo $module['left_column']; ?></div></div>
		<?php endif; ?>
		<?php if($module['column_configuration']=='text-image') : ?>
		<div class="column image-column reveal" style="background-image: url(<?php echo $module['right_column_image']['sizes']['half-width']; ?>);"></div>
		<?php else : ?>	
		<div class="column text-column reveal"><div class="text"><?php echo $module['right_column']; ?></div></div>		
		<?php endif; ?>
	</div>
	<?php endif; ?>
</section>
