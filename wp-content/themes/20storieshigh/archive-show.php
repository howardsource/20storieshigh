<?php
get_header();
?>


<?php get_template_part('banner'); ?>

<main id="main-content" class="site-main" role="main" aria-labelledby="shows-archive-title" tabindex="-1">

<div id="title-banner" class="outer no-image">
	<div class="inner">
		<h2 id="shows-archive-title"><span><?php post_type_archive_title(); ?></span></h2>
	</div>
</div>

<?php if (function_exists('yoast_breadcrumb')) : ?>
<div id="breadcrumb-bar" class="outer navy">
	<div class="inner breadcrumbs">
		<?php yoast_breadcrumb(); ?>
	</div>
</div>
<?php endif; ?>

<?php
$highlighted_show = get_field('highlighted_show', 'options');
$current_show_id  = $highlighted_show instanceof WP_Post
	? (int) $highlighted_show->ID
	: (is_numeric($highlighted_show) ? (int) $highlighted_show : 0);
?>

<?php if ($current_show_id > 0) : ?>
<div class="outer current-show yellow">
	<div class="inner">
		<div class="current-show-panel">
			<div class="project-text current-show-text">
				<p class="current-show-label">
					<?= get_field('show_highlight_title', 'options') ?: get_field('show_highlight_title', 'options'); ?>
				</p>
				<h3><?= get_the_title($current_show_id); ?></h3>
				<?php if (get_field('excerpt', $current_show_id)) : ?>
					<div class="project-excerpt">
						<?= get_field('excerpt', $current_show_id); ?>
					</div>
				<?php endif; ?>
				<?php if (get_field('performance_dates', $current_show_id)) : ?>
					<div class="project-date">
						<?= get_field('performance_dates', $current_show_id); ?>
					</div>
				<?php endif; ?>
				<p class="large-button-link">
					<a href="<?= esc_url(get_permalink($current_show_id)); ?>">View Show</a>
				</p>
			</div>
			<div class="project-image current-show-image">
				<a href="<?= esc_url(get_permalink($current_show_id)); ?>">
					<?php 
					$thumb = get_field('thumbnail', $current_show_id);
					$thumb_src = '';
					if (is_array($thumb)) {
						$thumb_src = $thumb['sizes']['half-width'] ?? '';
					} elseif (is_numeric($thumb)) {
						$thumb_src = wp_get_attachment_image_url((int)$thumb, 'half-width') ?: '';
					}
					if ($thumb_src) : ?>
						<img src="<?= esc_url($thumb_src); ?>" alt="<?= esc_attr(get_the_title($current_show_id)); ?>">
					<?php endif; ?>
				</a>
			</div>
		</div>
		<?php wp_reset_postdata(); ?>
	</div>
</div>
<?php endif; ?>

<div class="outer archive archive-projects purple">
	<div class="archive-heading-outer">
		<h3 class="archive-heading">Past Shows</h3>
	</div>
	<div class="inner">
		<?php if (have_posts()) : ?>
			<div class="projects-list">
				<?php while (have_posts()) : the_post(); ?>
					<?php if (!empty($current_show_id) && get_the_ID() === (int)$current_show_id) { continue; } ?>
					<article <?php post_class('project-item'); ?>>
						<a href="<?php the_permalink(); ?>" class="project-link">
						<?php if(get_field('show_status')=='current')	: ?>
						<div class="project-status">Current Show</div>
						<?php else : ?>
						<div class="project-status">Past Show</div>
						<?php endif; ?>
						<div class="project-image">
								<?php 
								$thumb = get_field('thumbnail');
								$thumb_src = '';
								if (is_array($thumb)) {
									$thumb_src = $thumb['sizes']['half-width']
										?? $thumb['sizes']['tile-5-4']
										?? $thumb['sizes']['large']
										?? $thumb['sizes']['carousel']
										?? $thumb['url']
										?? '';
								} elseif (is_numeric($thumb)) {
									$thumb_src = wp_get_attachment_image_url((int)$thumb, 'half-width')
										?: wp_get_attachment_image_url((int)$thumb, 'tile-5-4')
										?: wp_get_attachment_image_url((int)$thumb, 'large')
										?: wp_get_attachment_image_url((int)$thumb, 'full');
								}
								if ($thumb_src) : ?>
									<img src="<?= esc_url($thumb_src); ?>" alt="<?= esc_attr(get_the_title()); ?>">
								<?php endif; ?>
							</div>
							<div class="project-text">
								<h3><?php the_title(); ?></h3>
								<?php if (get_field('excerpt')) : ?>
									<div class="project-excerpt">
										<?php the_field('excerpt'); ?>
									</div>
								<?php endif; ?>
								<?php if (get_field('performance_dates')) : ?>
									<div class="project-date">
										<?php the_field('performance_dates'); ?>
									</div>
								<?php endif; ?>
								<p class="archive-more-link">
									<span>MORE</span>
								</p>
							</div>
						</a>
					</article>
				<?php endwhile; ?>
			</div>

			<div class="pagination">
				<?php
				the_posts_pagination(
					[
						'mid_size'           => 2,
						'prev_text'          => __('Previous', '20storieshigh'),
						'next_text'          => __('Next', '20storieshigh'),
						'screen_reader_text' => __('Projects navigation', '20storieshigh'),
					]
				);
				?>
			</div>
		<?php else : ?>
			<p><?php _e('No projects found.', '20storieshigh'); ?></p>
		<?php endif; ?>
	</div>
</div>
<div id="modules">
	<?php 
	$modules = get_field('modules', 'option');
	$modN = 1;
	$carouselN = 1;
	if($modules!=false) :
	foreach($modules as $module):
		include(locate_template('modules/'.$module['acf_fc_layout'].'.php')); 
		$modN++;
		if($module['acf_fc_layout']=='carousel' || $module['acf_fc_layout']=='panel_slider'|| $module['acf_fc_layout']=='latest_news') :
			$carouselN++;
		endif;
	endforeach; 
	endif;
	?>
</div>
</main>

<?php
get_footer();
?>
