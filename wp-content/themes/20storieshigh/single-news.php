<?php

get_header();

get_template_part('banner');
?>

<main id="main-content" class="site-main" role="main" tabindex="-1">
	<?php
	if (have_posts()) :
		while (have_posts()) :
			the_post();
			
			?>

<?php
$banner_image = get_field('banner_image');
$banner_background_url = '';
if ($banner_image) {
	$banner_background_url = isset($banner_image['sizes']['carousel']) ? $banner_image['sizes']['carousel'] : $banner_image['url'];
}
?>

<div<?php if (!empty($banner_background_url)) : ?> style="background-image: url(<?= esc_url($banner_background_url); ?>)";<?php endif; ?> id="title-banner" class="outer">
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


			<div class="outer news-single white">
				<div class="inner">
					<div class="news-single-text">
						<?php if (get_field('content')) : ?>
							<div class="news-body">
								<?php the_field('content'); ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="news-single-details">
						<p class="news-single-dates">
							Date Posted:<br>
							<?php the_date(); ?>
						</p>
					</div>
				</div>
			</div>
			<?php
		endwhile;
	endif;
	?>
<?php get_template_part('modules'); ?>
</main>
<?php
get_footer();
?>
