<?php
$banner_image = get_field('banner_image');
$banner_background_url = '';

if ($banner_image) {
	$banner_background_url = isset($banner_image['sizes']['carousel']) ? $banner_image['sizes']['carousel'] : $banner_image['url'];
} elseif (is_singular('projects')) {
	$proj_thumb = get_field('thumbnail');
	if ($proj_thumb) {
		$banner_background_url = isset($proj_thumb['sizes']['carousel']) ? $proj_thumb['sizes']['carousel'] : $proj_thumb['url'];
	}
}

$has_banner_image = !empty($banner_background_url);
?>

<div<?php if ($has_banner_image) : ?> style="background-image: url(<?= esc_url($banner_background_url); ?>)";<?php endif; ?> id="title-banner" class="outer<?php echo get_field('narrow_banner')==true ? ' narrow' : ''; if($has_banner_image) : echo ' banner-with-image'; else : echo ' no-image ' . esc_attr(get_field('banner_colour')); endif; ?>">
	<div class="inner"><h2><span><?php 
		if(get_field('banner_title')!='') :
			echo get_field('banner_title');
		else :
			the_title();
		endif; ?></span></h2>
	</div>
</div>
<?php if(function_exists('yoast_breadcrumb')) : ?>
<div id="breadcrumb-bar" class="outer navy">
	<div class="inner breadcrumbs"><?php yoast_breadcrumb(); ?></div>
</div>
<?php endif; ?>
