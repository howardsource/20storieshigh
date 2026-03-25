<?php 
$class = 'image';
$width = $module['width'] ?? '';
if ($width === 'column') :
	$class .= ' inner';
endif;	
$fixed_position = !empty($module['fixed_position']);
if ($fixed_position) :
	$class .= ' fixed-scroll';
endif;

$background_colour = $module['background_colour'] ?? 'white';
$image = $module['image'] ?? null;
$image_url = '';
$image_alt = '';
$image_width = '';
$image_height = '';

if (is_array($image)) {
	$image_url = $image['sizes']['carousel'] ?? ($image['url'] ?? '');
	$image_alt = $image['alt'] ?? '';
	$image_width = $image['sizes']['carousel-width'] ?? '';
	$image_height = $image['sizes']['carousel-height'] ?? '';
}
?>
<div class="module full-width-image outer <?= esc_attr($background_colour); ?>">
	<div class="<?= esc_attr($class); ?>"<?php if ($image_url) : ?> style="background-image: url('<?= esc_url($image_url); ?>')"<?php endif; ?>>
		<?php if ($image_url) : ?>
		<img src="<?= esc_url($image_url); ?>"<?php if ($image_width) : ?> width="<?= esc_attr($image_width); ?>"<?php endif; ?><?php if ($image_height) : ?> height="<?= esc_attr($image_height); ?>"<?php endif; ?> alt="<?= esc_attr($image_alt); ?>" />
		<?php endif; ?>
	</div>
</div>
